<?php

namespace App\Infrastructure\Repository;

use Exception;

class NotUniqueException extends Exception
{


    public static function permissionWithNameAlreadyCreated(string $permissionName): self
    {
        $e = new self("Permission with given name already created");
        $e->additionalParams = ['permissionName' => $permissionName];

        return $e;
    }

    public static function notUniqueRole(string $roleName): NotUniqueException
    {
        $e = new self("Role with given name already created");
        $e->additionalParams = ['roleName' => $roleName];

        return $e;
    }
}