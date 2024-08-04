<?php

namespace App\Infrastructure\Service;

use App\Application\Access\RbacServiceInterface;
use App\Application\Access\RoleCrudServiceInterface;
use App\Domain\Entity\PermissionEntity;
use App\Domain\Entity\RoleEntity;
use App\Domain\Repository\PermissionRepositoryInterface;
use App\Domain\Repository\RoleRepositoryInterface;

class RbacService implements RbacServiceInterface
{

    public function __construct(private readonly RoleCrudServiceInterface $roleCrudService, private readonly RoleRepositoryInterface $roleRepository)
    {
    }

    public function addRole(string $roleName, ?string $description = null): ?RoleEntity
    {
       try{
           return  $this->roleCrudService->create($roleName, $description);
       }catch (\Exception $exception){
           return  null;
       }

    }

    public function attachPermissionToRole(RoleEntity $role, PermissionEntity $permission): ?RoleEntity
    {

        try{
            return $this->roleRepository->addPermission($role, $permission);
        }catch (\Exception $exception){
            return null;
        }
    }

    public function attachChildRole(RoleEntity $parentRole, RoleEntity $childRole): RoleEntity
    {
        // TODO: Implement attachChildRole() method.
    }

    public function attachRoleToUser(RoleEntity $role, int $userId): void
    {
        // TODO: Implement assignRoleToUser() method.
    }

    public function checkForCyclicHierarchy(int $parentRoleId, int $childRoleId): void
    {
        // TODO: Implement checkForCyclicHierarchy() method.
    }
}