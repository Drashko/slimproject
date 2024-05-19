<?php

use App\Application\ApplicationInterface;
use App\Application\UserServiceInterface;
use App\Infrastructure\ORM\EntityManagerServiceInterface;
use App\Infrastructure\Repository\UserRepository;
use App\Infrastructure\Slim\Factory\LoggerFactory;
use App\Infrastructure\Slim\Handler\NotFoundHandler;
use App\Infrastructure\Support\Config;
use Doctrine\Common\Cache\Psr6\DoctrineProvider;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\ORMSetup;
use Fullpipe\TwigWebpackExtension\WebpackExtension;
use Odan\Session\PhpSession;
use Odan\Session\SessionInterface;
use Odan\Session\SessionManagerInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Slim\App;
use Slim\Exception\HttpNotFoundException;
use Slim\Factory\AppFactory;
use Slim\Factory\Psr17\Psr17Factory;
use Slim\Flash\Messages;
use Slim\Middleware\ErrorMiddleware;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;
use Symfony\Bridge\Twig\Extension\AssetExtension;
use Symfony\Component\Asset\Package;
use Symfony\Component\Asset\Packages;
use Symfony\Component\Asset\VersionStrategy\JsonManifestVersionStrategy;
use Symfony\Component\Cache\Adapter\ArrayAdapter;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputOption;
use Symfony\WebpackEncoreBundle\Asset\EntrypointLookup;
use Symfony\WebpackEncoreBundle\Asset\TagRenderer;
use Symfony\WebpackEncoreBundle\Twig\EntryFilesTwigExtension;
use Twig\Extension\DebugExtension;
use Twig\Extra\Intl\IntlExtension;

return [
    //get config files
    'settings' => function () {
        return require __DIR__ . '/settings.php';
    },
    Config::class => function (ContainerInterface $container) {
        return new Config($container->get('settings'));
    },
    //add session manager
    SessionManagerInterface::class => function (ContainerInterface $container) {
        return $container->get(SessionInterface::class);
    },
    //add session
    SessionInterface::class => function (ContainerInterface $container) {
        $options = $container->get('settings')['session'];

        return new PhpSession($options);
    },
    //add logger
    LoggerFactory::class => function (ContainerInterface $container) {
        return new LoggerFactory($container->get('settings')['logger']);
    },
    //add error handler
    ErrorMiddleware::class => function (ContainerInterface $container) {
        $app = $container->get(App::class);
        $settings = $container->get('settings')['error'];
        $logger = null;
        if (isset($settings['log_file'])) {
            $logger = $container->get(LoggerFactory::class)
                ->addFileHandler($settings['log_file'])
                ->createLogger();
        }
        $errorMiddleware = new ErrorMiddleware(
            $app->getCallableResolver(),
            $app->getResponseFactory(),
            (bool)$settings['display_error_details'],
            (bool)$settings['log_errors'],
            (bool)$settings['log_error_details'],
            $logger
        );
        // Set the Not Found Handler
        $errorMiddleware->setErrorHandler(HttpNotFoundException::class, NotFoundHandler::class);

        return $errorMiddleware;
    },
    // Twig templates
    Twig::class => function (ContainerInterface $container) {
        $settings = $container->get('settings');
        $twigSettings = $settings['twig'];

        $options = $twigSettings['options'];
        $options['cache'] = $options['cache_enabled'] ? $options['cache_path'] : false;

        $twig = Twig::create($twigSettings['paths'], $options);
        // The path must be absolute.
        // e.g. /var/www/example.com/public
        $publicPath = (string)$settings['public'];

        // Add global variables
        $environment = $twig->getEnvironment();
        $environment->addGlobal('flash', $container->get(Messages::class));

        // Add extensions
        $twig->addExtension(new WebpackExtension(
        // The manifest file.
            $publicPath . '/build/manifest.json',
            // The public path
            $publicPath
        ));

        $twig->addExtension(new DebugExtension());
        $twig->addExtension(new IntlExtension());
        $twig->addExtension(new EntryFilesTwigExtension($container));
        $twig->addExtension(new AssetExtension($container->get('webpack_encore.packages')));


        return $twig;
    },
    /**
     * The following two bindings are needed for EntryFilesTwigExtension & AssetExtension to work for Twig
     */
//    'webpack_encore.packages'  => fn(ContainerInterface $container) => new Packages(
//        new Package(new JsonManifestVersionStrategy( $container->get('settings')['public'] . '/build' . '/manifest.json'))
//    ),
//    'webpack_encore.tag_renderer'   => fn(ContainerInterface $container) => new TagRenderer(
//        new EntrypointLookupCollection($container),
//        $container->get('webpack_encore.packages')
//    ),

    /**
     * The following two bindings are needed for EntryFilesTwigExtension & AssetExtension to work for Twig
     */
    'webpack_encore.packages' => fn(ContainerInterface $container) => new Packages(
        new Package(new JsonManifestVersionStrategy($container->get('settings')['public'] . '/build' . '/manifest.json'))
    ),
    'webpack_encore.tag_renderer' => fn(ContainerInterface $container) => new TagRenderer(
        new EntrypointLookup($container->get('settings')['public'] . '/build' . '/entrypoints.json'),
        $container->get('webpack_encore.packages')
    ),

//    'webpack_encore.packages' => function (ContainerInterface $container){
//        $settings = $container->get('settings');
//        return new Packages(new Package( new JsonManifestVersionStrategy($settings['public'] .'/build' . '/manifest.json')));
//    },
//
//    'webpack_encore.tag_renderer' => function(ContainerInterface $container){
//        $settings = $container->get('settings');
//
//        $entryPoints = new EntrypointLookup($settings['public'] .'/build' . '/entrypoints.json');
//
//        return new TagRenderer($entryPoints), $container->get('webpack_encore.packages')
//        );
//        //return $container->get('webpack_encore.packages');
//    },


    //addtwig middleware
    TwigMiddleware::class => function (ContainerInterface $container) {
        return TwigMiddleware::createFromContainer(
            $container->get(App::class),
            Twig::class
        );
    },
    //add flash messages
    Messages::class => function () {
        $storage = [];

        return new Messages($storage);
    },
    //init console commands
    Application::class => function (ContainerInterface $container) {
        $application = new Application();
        $application->getDefinition()->addOption(
            new InputOption('--env', '-e', InputOption::VALUE_REQUIRED, 'The Environment name.', 'dev')
        );
        foreach ($container->get('settings')['commands'] as $class) {
            $application->add($container->get($class));
        }

        return $application;
    },

    //add doctrine
    EntityManagerInterface::class => function (ContainerInterface $container) {
        $settings = $container->get('settings');
        $cache = $settings['doctrine']['dev_mode'] ?
            DoctrineProvider::wrap(new ArrayAdapter()) :
            DoctrineProvider::wrap(new FilesystemAdapter(directory: $settings['doctrine']['cache_dir']));

        $config = ORMSetup::createAttributeMetadataConfiguration(
            $settings['doctrine']['metadata_dirs'],
            $settings['doctrine']['dev_mode']
        );

        $connection = DriverManager::getConnection($settings['doctrine']['connection'], $config);

        return new EntityManager($connection, $config);

    },

    //run the App with DI container
    App::class => function (ContainerInterface $container) {
        AppFactory::setContainer($container);

        return AppFactory::create();
    },

    ResponseFactoryInterface::class => function (ContainerInterface $container) {
        return $container->get(Psr17Factory::class);
    },

    EntityManagerServiceInterface::class => function (ContainerInterface $container) {
        $entityManager = $container->get(EntityManagerInterface::class);
        return new \App\Infrastructure\ORM\EntityManagerAdapterService($entityManager);
    },

    ApplicationInterface::class => function (ContainerInterface $container) {
        return new \App\Infrastructure\Service\Application(
            $container->get(LoggerFactory::class),
            $container->get(SessionInterface::class),
            $container->get(Twig::class),
            $container->get(Messages::class),
            $container->get(Config::class)
        );
    },

    \App\Domain\User\UserRepositoryInterface::class => function (ContainerInterface $container) {
        return new UserRepository($container->get(EntityManagerServiceInterface::class));
    },

    UserServiceInterface::class => function (ContainerInterface $container) {
        return new \App\Infrastructure\Service\UserService(
            $container->get(\App\Domain\User\UserRepositoryInterface::class),
            $container->get(EntityManagerServiceInterface::class),

        );
    }
];
