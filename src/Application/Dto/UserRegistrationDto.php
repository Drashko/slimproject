<?php
declare(strict_types=1);

namespace App\Application\Dto;

final class UserRegistrationDto
{
   private function __construct(
       public string $email,
       public string $password
   )
   {}

    public static function create(string $email, string $password): UserRegistrationDto
    {
        return new self( $email, $password);
    }

    public function getEmail(string $email): string {
       return $email;
    }

    public function getPassword(string $password): string {
        return $password;
    }

}