<?php
declare(strict_types=1);

namespace App\Application\Access;


use App\Domain\Permission\PermissionEntity;
use App\Domain\Role\RoleEntity;

interface AuthorizationInterface
{
    public function createPermission(string $permissionMane, ?string $description = null) : PermissionEntity;

    public function createRole(string $roleName, ?string $description = null): RoleEntity;

    public function attachPermissionToRole(RoleEntity $role, PermissionEntity $permission) : void;

    public function attachChildRole(RoleEntity $parentRole, RoleEntity $childRole) : RoleEntity;

    public function assignRoleToUser(RoleEntity $role, int $userId) : void;

    public function checkForCyclicHierarchy(int $parentRoleId, int $childRoleId): void;

}