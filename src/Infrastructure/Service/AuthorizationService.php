<?php

namespace App\Infrastructure\Service;

use App\Application\Access\AuthorizationServiceInterface;
use App\Domain\Repository\UserRepositoryInterface;

class AuthorizationService implements AuthorizationServiceInterface
{

    public function __construct(
        private UserRepositoryInterface $permissionRepository
    )
    {
    }

    public function hasAccess(int $userId, $permissionName): bool
    {
        // TODO: Implement hasAccess() method.
    }
}