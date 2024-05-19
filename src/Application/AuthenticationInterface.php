<?php
declare(strict_types=1);

namespace App\Application;

use App\Domain\User\UserEntity;

interface AuthenticationInterface
{
   public function registration(string $email, string $password, string $phone) : bool;

   public function logIn(UserEntity $userEntity , bool $remember_me = false) : void;

   public function logOut() : bool;
}