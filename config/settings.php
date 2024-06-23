<?php

use App\Infrastructure\Slim\Command\ExampleCommand;
use App\Infrastructure\Slim\Enum\AppEnvironment;
use Dotenv\Dotenv;

(Dotenv::createImmutable(__DIR__ . '/../'))->safeLoad();

$boolean = function(mixed $value) {
    if (in_array($value, ['true', 1, '1', true, 'yes'], true)) {
        return true;
    }

    return false;
};


//todo Important research about the right way to set env files
//$appEnv       = $_ENV['APP_ENV'] ?? AppEnvironment::Prod->value;
$appEnv       = $_ENV['APP_ENV'] ?? $_SERVER['APP_ENV'] ?? AppEnvironment::Prod->value;

$appSnakeName = strtolower(str_replace(' ', '_', $_ENV['APP_NAME']));

error_reporting(E_ALL);
// Should be set to '0' in production
ini_set('display_errors', $boolean($_ENV['APP_DEBUG'] ?? 0));

return [
    'session' => ['name' => 'webapp'],
    'public' => __DIR__ . '/../public',
    'error' => [
        // Should be set to false in production
        'display_error_details' => $boolean($_ENV['APP_DEBUG'] ?? 0),
        // Parameter is passed to the default ErrorHandler
        // View in rendered output by enabling the "displayErrorDetails" setting.
        // For the console and unit tests we also disable it
        'log_errors' => true,
        // Display error details in error log
        'log_error_details' => true,
        // The error logfile
        'log_file' => 'error.log',
    ],
    'logger' => [
        'name' => 'app',
        'path' => __DIR__ . '/../logs',
        'filename' => 'app.log',
        'level' =>  Monolog\Level::Debug,
        'file_permission' => 0775,
    ],
    'twig' => [// Template paths
        'paths' => [__DIR__ . '/../templates'],
        // Twig environment options
        'options' => [
            'debug' => $boolean($_ENV['APP_DEBUG'] ?? 0),
            'cache_enabled' => AppEnvironment::isDevelopment($appEnv), //todo  Should be set to true in production
            'cache_path' => __DIR__ . '/../tmp/twig'
        ],
        'form_theme' => 'layout/form.twig'
    ],
    'doctrine' => [
        // Enables or disables Doctrine metadata caching
        // for either performance or convenience during development.
        'dev_mode' => AppEnvironment::isDevelopment($appEnv),
        // Path where Doctrine will cache the processed metadata
        // when 'dev_mode' is false.
        'cache_dir' => __DIR__ . '/tmp/var/doctrine',
        // List of paths where Doctrine will search for metadata.
        // Metadata can be either YML/XML files or PHP classes annotated
        // with comments or PHP8 attributes.
        'metadata_dirs' => [__DIR__ . '/../src/Domain/Entity'],
        // The parameters Doctrine needs to connect to your database.
        // These parameters depend on the driver (for instance the 'pdo_sqlite' driver
        // needs a 'path' parameter and doesn't use most of the ones shown in this example).
        // Refer to the Doctrine documentation to see the full list
        // of valid parameters: https://www.doctrine-project.org/projects/doctrine-dbal/en/current/reference/configuration.html
        'connection' => [
            'driver' => $_ENV['DB_DRIVER'] ?? 'pdo_mysql',
            'host' => $_ENV['DB_HOST'] ?? 'localhost',
            'port' => $_ENV['DB_PORT'] ?? 3306,
            'dbname' => $_ENV['DB_NAME'],
            'user' => $_ENV['DB_USER'],
            'password' => $_ENV['DB_PASS'],
            'charset' => 'utf8'
        ]
     ],
    'localization_path' => [
        'bg' => __DIR__ . '/../Localization/bg.php',
        'en' => __DIR__ . '/../Localization/bg.php'
    ],
    'commands' => [
        ExampleCommand::class,
    ],
];

