<?php
declare(strict_types=1);

namespace App\Domain\Repository;

use App\Domain\Entity\PermissionEntity;
use App\Domain\Entity\RoleEntity;

interface PermissionRepositoryInterface
{
    public function findPermissionsAttachedToRole(RoleEntity $role): ?array;

    public function findPermissionById(int $id): ?PermissionEntity;

    public function findPermissionsByName(string $name): array;
}