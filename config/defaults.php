<?php
// Should be set to 0 in production


use App\Infrastructure\Slim\Command\ExampleCommand;

error_reporting(E_ALL);

// Should be set to '0' in production
ini_set('display_errors', '1');

// Settings
$settings = [];

$settings['session'] = [
    'name' => 'webapp',
];

$settings['public'] = __DIR__ . '/../public';

// Logger settings
$settings['logger'] = [
    'name' => 'app',
    'path' => __DIR__ . '/../logs',
    'filename' => 'app.log',
    'level' =>  Monolog\Level::Debug,
    'file_permission' => 0775,
];

// Error Handling Middleware settings
$settings['error'] = [
    // Should be set to false in production
    'display_error_details' => true,
    // Parameter is passed to the default ErrorHandler
    // View in rendered output by enabling the "displayErrorDetails" setting.
    // For the console and unit tests we also disable it
    'log_errors' => true,
    // Display error details in error log
    'log_error_details' => true,
    // The error logfile
    'log_file' => 'error.log',
];

// Twig settings
$settings['twig'] = [
    // Template paths
    'paths' => [
        __DIR__ . '/../templates',
    ],
    // Twig environment options
    'options' => [
        'debug' => true,
        'cache_enabled' => false, //todo  Should be set to true in production
        'cache_path' => __DIR__ . '/../tmp/twig'
    ],
    'form_theme' => 'layout/form.twig'
];
$settings['doctrine']  = [
    // Enables or disables Doctrine metadata caching
    // for either performance or convenience during development.
    'dev_mode' => true,
    // Path where Doctrine will cache the processed metadata
    // when 'dev_mode' is false.
    'cache_dir' => __DIR__ . '/tmp/var/doctrine',
    // List of paths where Doctrine will search for metadata.
    // Metadata can be either YML/XML files or PHP classes annotated
    // with comments or PHP8 attributes.
//    'metadata_dirs' => [__DIR__ . '/src/Domain/Entity'],
    'metadata_dirs' => [__DIR__ . '/../src/Domain/Entity'],
    // The parameters Doctrine needs to connect to your database.
    // These parameters depend on the driver (for instance the 'pdo_sqlite' driver
    // needs a 'path' parameter and doesn't use most of the ones shown in this example).
    // Refer to the Doctrine documentation to see the full list
    // of valid parameters: https://www.doctrine-project.org/projects/doctrine-dbal/en/current/reference/configuration.html
    'connection' => [
        'driver' => 'pdo_mysql',
        'host' => 'localhost',
        'port' => 3306,
        'dbname' => 'slim',
        'user' => 'root',
        'password' => '',
        'charset' => 'utf8'
    ]
];
//add localization paths
$settings['localization_path'] = [
    'bg' => __DIR__ . '/../Localization/bg.php',
    'en' => __DIR__ . '/../Localization/bg.php',
];

//add commands here
$settings['commands'] = [
    ExampleCommand::class,
    // Add more here...
];

return $settings;

