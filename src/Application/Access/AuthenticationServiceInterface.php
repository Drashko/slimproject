<?php
declare(strict_types=1);

namespace App\Application\Access;

use App\Domain\Entity\UserEntity;

interface AuthenticationServiceInterface
{
   public function registration(string $email, string $password, string $phone) : bool;

   public function logIn(UserEntity $userEntity , bool $remember_me = false) : void;

   public function logOut() : bool;
}