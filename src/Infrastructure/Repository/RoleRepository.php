<?php

namespace App\Infrastructure\Repository;

use App\Domain\Entity\RoleEntity;
use App\Domain\Repository\RoleRepositoryInterface;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\EntityRepository;

class RoleRepository extends EntityRepository implements RoleRepositoryInterface
{


    public function findRoleById(int $id): RoleEntity
    {
        // TODO: Implement findRoleById() method.
    }

    public function findRoleByName(string $name): RoleEntity
    {
        // TODO: Implement findRoleByName() method.
    }

    public function findChildrenRoles(int $roleId): array
    {
        // TODO: Implement findChildrenRoles() method.
    }
}