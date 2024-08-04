<?php
declare(strict_types = 1);

namespace App\Infrastructure\ORM;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

interface EntityManagerAdapterServiceInterface
{
//    public function getEm(): EntityManagerInterface;
//
//    public function sync($entity = null): void;
//
//    public function remove($entity, bool $sync = false): void;
//
//    public function clear(?string $entityName = null): void;
//
//    public function getRepository(string $entity): EntityRepository;

    public function getRepository(string $className);
    public function persist(object $entity): void;
    public function flush(): void;
    public function remove(object $entity): void;

}