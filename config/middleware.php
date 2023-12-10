<?php

use App\Factory\LoggerFactory;
use App\Middleware\FlashMessagesMiddleware;
use Odan\Session\Middleware\SessionStartMiddleware;
use Slim\Middleware\ErrorMiddleware;
use Slim\App;
use Slim\Views\TwigMiddleware;

return function (App $app) {

    //add flash messages
    $app->add(FlashMessagesMiddleware::class);

    // Start the session
    $app->add(SessionStartMiddleware::class);

    // Parse json, form data and xml
    $app->addBodyParsingMiddleware();

    //add twig
    $app->add(TwigMiddleware::class);

    // Add the Slim built-in routing middleware
    $app->addRoutingMiddleware();

    //log errors
    $loggerFactory = $app->getContainer()->get(LoggerFactory::class);
    $logger = $loggerFactory->addFileHandler('error.log')->createLogger();

    // Handle exceptions
    $app->add(ErrorMiddleware::class);
};