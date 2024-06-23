<?php

namespace Tests;

use Exception;
use PHPUnit\Framework\TestCase;
use Slim\App;

class BaseTestCase extends TestCase
{
    protected static mixed $app;
    protected static mixed $container;

    /**
     * @throws Exception
     */
    public static function setUpBeforeClass(): void
    {
        self::$app = require  __DIR__ . '/../config/bootstrap.php';

        self::$container = self::$app->getContainer();
    }

    public static function getApp(): App
    {
        return self::$app;
    }

    public static function getContainer()
    {
        return self::$container;
    }
}