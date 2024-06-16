<?php
declare(strict_types = 1);

namespace App\Infrastructure\ORM;

use Doctrine\ORM\EntityManagerInterface;

interface EntityManagerAdapterServiceInterface
{
    public function __call(string $name, array $arguments);

    public function sync($entity = null): void;

    public function delete($entity, bool $sync = false): void;

    public function clear(?string $entityName = null): void;

    public function entityManager(): EntityManagerInterface;
}