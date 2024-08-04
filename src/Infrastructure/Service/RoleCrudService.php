<?php

namespace App\Infrastructure\Service;

use App\Application\Access\RoleCrudServiceInterface;
use App\Application\Dto\RoleDto;
use App\Domain\Entity\RoleEntity;
use App\Domain\Repository\RoleRepositoryInterface;
use App\Infrastructure\ORM\EntityManagerAdapterServiceInterface;
use Doctrine\ORM\EntityManagerInterface;

class RoleCrudService implements RoleCrudServiceInterface
{

    public function __construct(private readonly RoleRepositoryInterface $roleRepository)
    {
    }

    public function create(string $roleName, string $description = null): ?RoleEntity
    {
        try {
            //todo add validation

            $role = new RoleEntity();
            $role->setName($roleName);
            $role->setDescription($description);
            $role->setCreatedAt(new \DateTimeImmutable("now"));
            return $this->roleRepository->create($role);

        } catch (\Exception $exception) {
            // Optionally, log the exception or handle it accordingly
            return null; // Return null or throw a custom exception
        }
    }

    public function update(int $id, string $roleName, string $description = null): ?RoleEntity
    {
        try {
            $role = $this->roleRepository->findById($id);
            $role->setName($roleName);
            $role->setDescription($description);
            $role->setUpdatedAt(new \DateTimeImmutable('now'));
            $this->roleRepository->update($role);
            return $role;

        } catch (\Exception $exception) {
            // Optionally, log the exception or handle it accordingly
            return null; // Return null or throw a custom exception
        }

    }
}