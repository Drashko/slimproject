<?php
declare(strict_types=1);

namespace App\Application\Access;


use App\Domain\Entity\PermissionEntity;
use App\Domain\Entity\RoleEntity;

interface AuthorizationServiceInterface
{
    public function hasAccess(int $userId, $permissionName): bool;

}