<?php

namespace App\Domain\User;

interface UserRepositoryInterface
{
    public function findById(int $id) : ?UserEntity;

    public function findByEmail(string $email) : UserEntity;

    public function list(array $params) : array;

}