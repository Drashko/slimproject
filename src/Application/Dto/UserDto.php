<?php

namespace Dto;

final class UserDto
{

    private  function __construct(
        public string $firstName,
        public string $lastName,
        public string $email)
    {}

    public static function create($firstNam, $lastName,$email): UserDto
    {
        return new self($firstNam,$lastName,$email);
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getFirstName(): string {
        return $this->firstName;
    }

    public function getLastName(): string{
        return $this->lastName;
    }


}