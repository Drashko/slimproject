<?php

namespace App\Infrastructure\Repository;


use App\Domain\Entity\PermissionEntity;
use App\Domain\Entity\RoleEntity;
use App\Domain\Repository\RoleRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;


class RoleRepository extends EntityRepository implements RoleRepositoryInterface
{


    public function __construct(private readonly EntityManagerInterface $entityManager, private readonly ClassMetadata $class)
    {
        parent::__construct($this->entityManager, $this->class);
    }

    public function findById(int $id): RoleEntity
    {
        return $this->entityManager->getRepository(RoleEntity::class)->find($id);
    }

    public function findOneByName(string $name): RoleEntity
    {
        return $this->entityManager->getRepository(RoleEntity::class)->findOneBy(['name' => $name]);
    }

    public function findChildrenRoles(int $roleId): array
    {
        // TODO: Implement findChildrenRoles() method.
    }

    public function create(RoleEntity $roleEntity): RoleEntity
    {
        $this->entityManager->persist($roleEntity);
        $this->entityManager->flush();

        return $roleEntity;
    }

    public function update(RoleEntity $roleEntity): RoleEntity
    {
        $this->entityManager->persist($roleEntity);
        $this->entityManager->flush();

        return $roleEntity;
    }

    public function addPermission(RoleEntity $roleEntity, PermissionEntity $permissionEntity): ?RoleEntity
    {
         $roleEntity->addPermission($permissionEntity);
         $this->entityManager->persist($roleEntity);
         $this->entityManager->flush();
         return $roleEntity;
    }
}