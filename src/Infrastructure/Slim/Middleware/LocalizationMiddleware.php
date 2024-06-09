<?php

namespace App\Infrastructure\Slim\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class LocalizationMiddleware implements MiddlewareInterface
{

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $uri = $request->getUri();
        $path = $uri->getPath();
        $segments = explode('/', trim($path, '/'));
        $language = $segments[0] ?? 'bg';//set default lang

        if (!in_array($language, ['en', 'bg'])) {
            $language = 'en';
        }

        array_shift($segments);
        $path = '/' . implode('/', $segments);

        $messages = require __DIR__ . '/../Localization/' . $language . '.php';

        $request = $request->withAttribute('messages', $messages);
        $request = $request->withAttribute('language', $language);
        $request = $request->withUri($uri->withPath($path));

        dump($request);

        return $handler->handle($request);
    }
}