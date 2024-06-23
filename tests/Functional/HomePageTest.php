<?php

namespace Functional;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;
use Slim\Factory\AppFactory;
use Slim\Psr7\Factory\ServerRequestFactory;

class HomePageTest extends TestCase
{

    private App $app;

    protected function setUp(): void
    {
        $this->app = AppFactory::create();

        // Register routes
        $this->app->get('/', function ($request, $response, $args) {
            $response->getBody()->write("Welcome to Slim!");
            return $response;
        });
    }

    public function testHomePage()
    {
        $request = $this->createRequest();
        $response = $this->app->handle($request);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertStringContainsString('Welcome to Slim!', (string)$response->getBody());
    }

    private function createRequest(): ServerRequestInterface
    {
        $serverRequestFactory = new ServerRequestFactory();
        return $serverRequestFactory->createServerRequest('GET', '/');
    }

}