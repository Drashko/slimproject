<?php

namespace App\Infrastructure\Repository;

use App\Domain\Entity\PermissionEntity;
use App\Domain\Entity\RoleEntity;
use App\Domain\Repository\PermissionRepositoryInterface;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\EntityRepository;

class PermissionRepository extends  EntityRepository implements PermissionRepositoryInterface
{

    /**
     * @throws NotUniqueException
     */
    public function createPermission(string $permissionName, ?string $description = null): PermissionEntity
    {
        $permission = new PermissionEntity();
        $permission->setName($permissionName);

        if (isset($description)) {
            $permission->setDescription($description);
        }

        try {
            $this->_em->persist($permission);
            $this->_em->flush();
        } catch (UniqueConstraintViolationException $e) {
            throw new NotUniqueException( $e->getMessage());
        }

        return $permission;
    }

    public function attachPermission(RoleEntity $role, PermissionEntity $permission): PermissionEntity
    {
        // TODO: Implement attachPermission() method.
    }
}