<?php

namespace App\Infrastructure\Service;

use App\Application\Access\AuthorizationInterface;
use App\Domain\Entity\PermissionEntity;
use App\Domain\Entity\RoleEntity;

class Authorization implements AuthorizationInterface
{

    public function createPermission(string $permissionMane, ?string $description = null): PermissionEntity
    {
        // TODO: Implement createPermission() method.
    }

    public function createRole(string $roleName, ?string $description = null): RoleEntity
    {
        // TODO: Implement createRole() method.
    }

    public function attachPermissionToRole(RoleEntity $role, PermissionEntity $permission): void
    {
        // TODO: Implement attachPermissionToRole() method.
    }

    public function attachChildRole(RoleEntity $parentRole, RoleEntity $childRole): RoleEntity
    {
        // TODO: Implement attachChildRole() method.
    }

    public function assignRoleToUser(RoleEntity $role, int $userId): void
    {
        // TODO: Implement assignRoleToUser() method.
    }

    public function checkForCyclicHierarchy(int $parentRoleId, int $childRoleId): void
    {
        // TODO: Implement checkForCyclicHierarchy() method.
    }
}