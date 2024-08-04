<?php

namespace App\Application\Access;

use App\Application\Dto\PermissionDto;
use App\Domain\Entity\PermissionEntity;


interface PermissionServiceInterface
{
    public function add(PermissionDto $permissionDto): PermissionEntity;

    public function update(int $id, PermissionDto $permissionDto): PermissionEntity;

    public function remove(PermissionEntity $permissionEntity): bool;
}