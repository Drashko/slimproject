<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;
use Slim\Routing\RouteCollectorProxy;

return function (App $app) {
//    $app->get('/', function (ServerRequestInterface $request, ResponseInterface $response) {
//        $response->getBody()->write('Hello, World!');
//
//        return $response;
//    });

//    $app->get('/', [\App\Action\Front\IndexAction::class, 'index']);
//
//    $app->get('/about', function (ServerRequestInterface $request, ResponseInterface $response) {
//        $response->getBody()->write('Hello, World!');
//        return $response;
//    });

    //admin
    $app->group('', function () use ($app) {
        $app->get('/admin', [\App\Action\Admin\IndexAction::class, 'index']);
        $app->get('/admin/users', [\App\Action\Admin\UserAction::class, 'index']);
        $app->get('/admin/settings', [\App\Action\Admin\SettingsAction::class, 'index']);
    });
    //frontend end
//    $app->group('', function() use ($app){
//
//    });

    $app->group('', function(RouteCollectorProxy $authentication) {
        $authentication->get('/signin', [\App\Action\Auth\SignInAction::class, 'index']);
        $authentication->get('/signup', [\App\Action\Auth\SignUpAction::class, 'index']);
        $authentication->post('/signup', [\App\Action\Auth\SignUpAction::class, 'index']);
        $authentication->get('/forgot_password', [\App\Action\Auth\ForgotPasswordAction::class, 'index']);
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