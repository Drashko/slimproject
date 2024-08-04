<?php

namespace App\Domain\Repository;

use App\Application\Dto\RoleDto;
use App\Domain\Entity\PermissionEntity;
use App\Domain\Entity\RoleEntity;

interface RoleRepositoryInterface
{
    public function findById(int $id): ?RoleEntity;

    public function findOneByName(string $name): RoleEntity;

    public function findChildrenRoles(int $roleId): array;

    public function create(RoleEntity $roleEntity): ?RoleEntity;

    public function update(RoleEntity $roleEntity): ?RoleEntity;

    public function addPermission(RoleEntity $roleEntity, PermissionEntity $permissionEntity) : ?RoleEntity;

}