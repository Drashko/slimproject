<?php

namespace App\Infrastructure\Repository;

use App\Domain\Entity\PermissionEntity;
use App\Domain\Entity\RoleEntity;
use App\Domain\Repository\PermissionRepositoryInterface;
use App\Infrastructure\ORM\EntityManagerAdapterServiceInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;


class PermissionRepository extends EntityRepository implements PermissionRepositoryInterface
{
    public function __construct(private readonly EntityManagerInterface $entityManager, private readonly ClassMetadata $class)
    {
        parent::__construct($this->entityManager, $this->class);
    }

    public function findPermissionsAttachedToRole(RoleEntity $role): ?array
    {
        return [] ?? null;
    }

    public function findPermissionById(int $id): ?PermissionEntity
    {
        return $this->entityManager->getRepository(PermissionEntity::class)->find($id);
    }

    public function findPermissionsByName(string $name): array
    {
       return  $this->entityManager->getRepository(PermissionEntity::class)->findOneBy(['name' => $name]);
    }
}