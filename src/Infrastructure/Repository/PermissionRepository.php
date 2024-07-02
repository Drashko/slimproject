<?php

namespace App\Infrastructure\Repository;

use App\Domain\Entity\PermissionEntity;
use App\Domain\Entity\RoleEntity;
use App\Domain\Repository\PermissionRepositoryInterface;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\EntityRepository;

class PermissionRepository extends  EntityRepository implements PermissionRepositoryInterface
{


    public function findPermissionsAttachedToRole(RoleEntity $role): ?array
    {
        // TODO: Implement findPermissionsAttachedToRole() method.
    }

    public function findPermissionById(int $id): ?PermissionEntity
    {
        // TODO: Implement findPermissionById() method.
    }

    public function findPermissionsByName(string $name): array
    {
        // TODO: Implement findPermissionsByName() method.
    }
}