<?php

namespace App\Application\Dto;

final class RoleDto
{
    private function __construct(
        public string $name,
        public string $description
    )
    {
    }

    public static function create(string $name, string $description): RoleDto
    {
        return new self($name, $description);
    }

    public function getName(): string
    {
        return $this->name;
    }


    public function getDescription(): string
    {
        return $this->description;
    }
}
