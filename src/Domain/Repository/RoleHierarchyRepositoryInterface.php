<?php

namespace App\Domain\Repository;

interface RoleHierarchyRepositoryInterface
{
    public function hasChildRoleId(int $parentRoleId, int $findingChildId): bool;

    public function getAllRoleIdsHierarchy(array $rootRoleIds): array;

    public function getAllChildRoleIds(array $parentIds): array;

    public function getChildIds(array $parentIds): array;
}