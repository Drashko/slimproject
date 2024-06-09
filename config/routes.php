<?php

use Slim\App;
use Slim\Routing\RouteCollectorProxy;

return function (App $app) {
//    $app->get('/', function (ServerRequestInterface $request, ResponseInterface $response) {
//        $response->getBody()->write('Hello, World!');
//
//        return $response;
//    });

//    $app->get('/', [\App\Controller\Front\IndexController::class, 'index']);
//
//    $app->get('/about', function (ServerRequestInterface $request, ResponseInterface $response) {
//        $response->getBody()->write('Hello, World!');
//        return $response;
//    });

    //admin
    $app->group('', function () use ($app) {
        $app->get('/{lang:bg|en}/admin', [\App\Infrastructure\Slim\Controller\Admin\IndexController::class, 'index']);
//        $app->get('/{lang:bg}/admin', [\App\Infrastructure\Slim\Controller\Admin\IndexController::class, 'index']);
//        $app->get('/{lang:en}/admin', [\App\Infrastructure\Slim\Controller\Admin\IndexController::class, 'index']);
        $app->get('/admin/users', [\App\Infrastructure\Slim\Controller\Admin\UserController::class, 'index']);
        $app->get('/admin/settings', [\App\Infrastructure\Slim\Controller\Admin\SettingsController::class, 'index']);
        //$app->get('/admin/tests', [\App\Application\Controller\Admin\TestController::class, 'index']);
    });
    //front end
    $app->group('', function(RouteCollectorProxy $authentication) {
        $authentication->get('/', [\App\Infrastructure\Slim\Controller\Front\IndexController::class, 'index']);
        $authentication->get('/signin', [\App\Infrastructure\Slim\Controller\Auth\SignInController::class, 'index']);
        $authentication->get('/signup', [\App\Infrastructure\Slim\Controller\Auth\SignUpController::class, 'index']);
        $authentication->post('/signup', [\App\Infrastructure\Slim\Controller\Auth\SignUpController::class, 'index']);
        $authentication->get('/forgot_password', [\App\Infrastructure\Slim\Controller\Auth\ForgotPasswordController::class, 'index']);
    });

    
    // $app->group('/categories', function (RouteCollectorProxy $categories) {
    //        $categories->get('', [CategoryController::class, 'index']);
    //        $categories->get('/load', [CategoryController::class, 'load']);
    //        $categories->post('', [CategoryController::class, 'store']);
    //        $categories->delete('/{id:[0-9]+}', [CategoryController::class, 'delete']);
    //        $categories->get('/{id:[0-9]+}', [CategoryController::class, 'get']);
    //        $categories->post('/{id:[0-9]+}', [CategoryController::class, 'update']);
    //    })->add(AuthMiddleware::class);


};