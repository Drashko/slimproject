<?php
declare(strict_types = 1);

namespace App\Infrastructure\Slim\Enum;

enum AppEnvironment: string
{
    case Dev = 'dev';
    case Test  = 'test';
    case Prod  = 'prod';


    public static function isProduction(string $appEnvironment): bool
    {
        return self::tryFrom($appEnvironment) === self::Prod;
    }

    public static function isDevelopment(string $appEnvironment): bool
    {
        return self::tryFrom($appEnvironment) === self::Dev;
    }

    public static function isTest(string $appEnvironment): bool{
        return self::tryFrom($appEnvironment) === self::Test;
    }

}