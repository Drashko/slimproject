<?php
declare(strict_types=1);

namespace App\Application\Dto;

final class UserDto
{

    private  function __construct(
        public string $name,
        public string $email,
        public string $password
    )
    {}

    public static function create(string $name, string  $email, string $password): UserDto
    {
        return new self($name, $email,$password);
    }

    public function getName(): string
    {
        return $this->name;
    }


    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string{
        return $this->password;
    }


}