<?php
declare(strict_types=1);

namespace App\Application\User;

use App\Application\Dto\UserDto;
use App\Domain\User\UserEntity;

interface UserServiceInterface
{
   public function create(UserDto $user) : UserEntity;

   public function update(int $id, UserDto $user) : UserEntity;

   public function delete(int $userId) : bool;

   public function list(array $params) : array;

}