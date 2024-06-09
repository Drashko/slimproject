<?php
declare(strict_types=1);

namespace App\Application\Dto;

final class UserDto
{

    private  function __construct(
        public string $email,
        public string $password
    )
    {}

    public static function create($email, $password): UserDto
    {
        return new self($email,$password);
    }

    public function getEmail(): string
    {
        return $this->email;
    }



    public function getPassword(): string{
        return $this->password;
    }


}