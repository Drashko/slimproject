<?php

namespace App\Domain\Repository;

use App\Domain\Entity\RoleEntity;

interface RoleRepositoryInterface
{
    public function createRole(string $roleName, ?string $description = null): RoleEntity;
}