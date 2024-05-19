<?php
declare(strict_types=1);

namespace App\Infrastructure\Slim\Handler;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Interfaces\ErrorHandlerInterface;
use Slim\Psr7\Response;
use Throwable;

final class NotFoundHandler implements ErrorHandlerInterface
{
    public function __invoke(ServerRequestInterface $request, Throwable $exception, bool $displayErrorDetails, bool $logErrors, bool $logErrorDetails): ResponseInterface {
        $response = new Response();
        $response->getBody()->write('404 NOT FOUND');

        return $response->withStatus(404);
    }
}