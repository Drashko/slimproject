<?php

namespace App\Domain\Repository;

use App\Domain\Entity\UserEntity;

interface UserRepositoryInterface
{
    public function findById(int $id) : ?UserEntity;

    public function findByEmail(string $email) : UserEntity;

    public function list(array $params) : array;

}