<?php

namespace App\Domain\Repository;

use App\Domain\Entity\UserEntity;

interface UserRepositoryInterface
{
    public function findById(int $id) : ?UserEntity;

    public function findOneByEmail(string $email) : ?UserEntity;

    public function filtered(array $conditions) : array;

    public function create(UserEntity $userEntity) : ?UserEntity;

    public function update(UserEntity $userEntity) : void;

    public function delete(UserEntity $userEntity) : bool;

}