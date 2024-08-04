<?php
declare(strict_types=1);

namespace App\Application\User;

use App\Application\Dto\UserDto;
use App\Domain\Entity\UserEntity;

interface UserCrudServiceInterface
{
  public function create(UserDto $userDto): ?UserEntity;
  public function update(int  $id, UserDto $userDto): ?UserEntity;
  public function delete(int $id): bool;
}