<?php
declare(strict_types=1);

namespace App\Domain\Repository;

use App\Domain\Entity\PermissionEntity;
use App\Domain\Entity\RoleEntity;

interface PermissionRepositoryInterface
{
    public function createPermission(string $permissionName, ?string $description = null) : PermissionEntity;

    public function attachPermission(RoleEntity $role, PermissionEntity $permission) : PermissionEntity;
}