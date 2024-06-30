<?php

namespace App\Infrastructure\Repository;

use App\Domain\Entity\RoleEntity;
use App\Domain\Repository\RoleRepositoryInterface;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\EntityRepository;

class RoleRepository extends EntityRepository implements RoleRepositoryInterface
{

    public function createRole(string $roleName, ?string $description = null): RoleEntity
    {
        $role = new RoleEntity();
        $role->setName($roleName);

        if (isset($description)) {
            $role->setDescription($description);
        }

        try {
            $this->_em->persist($role);
            $this->_em->flush();
        } catch (UniqueConstraintViolationException $e) {
            throw NotUniqueException::notUniqueRole($roleName);
        }

        return $role;
    }
}