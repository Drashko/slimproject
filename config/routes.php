<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;

return function (App $app) {
//    $app->get('/', function (ServerRequestInterface $request, ResponseInterface $response) {
//        $response->getBody()->write('Hello, World!');
//
//        return $response;
//    });

    $app->get('/', [\App\Action\Front\IndexAction::class, 'index']);

    $app->get('/about', function (ServerRequestInterface $request, ResponseInterface $response) {
        $response->getBody()->write('Hello, World!');
        return $response;
    });

    //admin
    $app->group('', function () use ($app) {
        $app->get('/admin', [\App\Action\Admin\IndexAction::class, 'index']);
        $app->get('/admin/users', [\App\Action\Admin\UserAction::class, 'index']);
        $app->get('/admin/settings', [\App\Action\Admin\SettingsAction::class, 'index']);
    });
    //frontend end
    $app->get('/signin', [\App\Action\Auth\SignInAction::class, 'index']);
    $app->get('/signup', [\App\Action\Auth\SignUpAction::class, 'index']);
    $app->get('/forgot_password', [\App\Action\Auth\ForgotPasswordAction::class, 'index']);


};