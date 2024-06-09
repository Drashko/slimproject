<?php

namespace App\Infrastructure\Slim\Validation;

use Symfony\Component\Validator\Constraints as Assert;

class UserValidator
{
    #[Assert\NotBlank]
    #[Assert\Email]
    public string $email;

    #[Assert\NotBlank]
    #[Assert\PasswordStrength]
    //todo add password min max length
    public string $password;
}