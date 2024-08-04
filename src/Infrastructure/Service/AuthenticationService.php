<?php

namespace App\Infrastructure\Service;

use App\Application\Access\AuthenticationServiceInterface;
use App\Domain\Entity\UserEntity;

class AuthenticationService implements AuthenticationServiceInterface
{

    public function registration(string $email, string $password, string $phone): bool
    {
        // TODO: Implement registration() method.
    }

    public function logIn(UserEntity $userEntity, bool $remember_me = false): void
    {
        // TODO: Implement logIn() method.
    }

    public function logOut(): bool
    {
        // TODO: Implement logOut() method.
    }
}