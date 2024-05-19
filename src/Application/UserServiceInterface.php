<?php
declare(strict_types=1);

namespace App\Application;

use App\Domain\User\UserEntity;
use Dto\UserDto;

interface UserServiceInterface
{
   public function create(UserDto $user) : UserEntity;

   public function update(int $id, UserDto $user) : UserEntity;

   public function delete(int $userId) : bool;

   public function list(array $params) : array;

}