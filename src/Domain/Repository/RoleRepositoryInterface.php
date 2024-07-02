<?php

namespace App\Domain\Repository;

use App\Domain\Entity\RoleEntity;

interface RoleRepositoryInterface
{
    public function findRoleById(int $id): RoleEntity;

    public function findRoleByName(string $name): RoleEntity;

    public function findChildrenRoles(int $roleId): array;
}