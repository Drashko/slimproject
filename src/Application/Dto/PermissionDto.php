<?php

namespace App\Application\Dto;

final class PermissionDto
{
    private function __construct(
        public int    $roleId,
        public string $name,
        public string $description
    )
    {
    }

    public static function create(int $roleId, string $name, string $description): PermissionDto
    {
        return new self($roleId, $name, $description);
    }

    public function getRoleId(): int
    {
        return $this->roleId;
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