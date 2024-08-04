<?php

namespace App\Application\Access;

use App\Application\Dto\RoleDto;
use App\Domain\Entity\RoleEntity;

interface RoleCrudServiceInterface
{
   public function create(string $roleName, string $description = null): ?RoleEntity;
   public function update(int $id, string $roleName, string $description = null): ?RoleEntity;

}