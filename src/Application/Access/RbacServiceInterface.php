<?php

namespace App\Application\Access;

use App\Domain\Entity\PermissionEntity;
use App\Domain\Entity\RoleEntity;

interface RbacServiceInterface
{
    public function addRole(string $roleName, ?string $description = null): ?RoleEntity;

    public function attachPermissionToRole(RoleEntity $role, PermissionEntity $permission) : ?RoleEntity;

    public function attachChildRole(RoleEntity $parentRole, RoleEntity $childRole) : ?RoleEntity;

    public function attachRoleToUser(RoleEntity $role, int $userId) : void;

    public function checkForCyclicHierarchy(int $parentRoleId, int $childRoleId): void;
}