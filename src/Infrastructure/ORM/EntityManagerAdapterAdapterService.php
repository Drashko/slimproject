<?php

namespace App\Infrastructure\ORM;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

class EntityManagerAdapterAdapterService implements EntityManagerAdapterServiceInterface
{

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getRepository(string $className)
    {
        return $this->entityManager->getRepository($className);
    }

    public function persist(object $entity): void
    {
        $this->entityManager->persist($entity);
    }

    public function flush(): void
    {
        $this->entityManager->flush();
    }

    public function remove(object $entity): void
    {
        $this->entityManager->remove($entity);
    }

//    public function getEm(): EntityManagerInterface
//    {
//        return $this->entityManager;
//    }
//
//
//    public function sync($entity = null): void
//    {
//        if ($entity) {
//            $this->entityManager->persist($entity);
//        }
//
//        $this->entityManager->flush();
//    }
//
//    public function remove($entity, bool $sync = false): void
//    {
//        $this->entityManager->remove($entity);
//
//        if ($sync) {
//            $this->sync();
//        }
//    }
//
//    public function clear(?string $entityName = null): void
//    {
//        if ($entityName === null) {
//            $this->entityManager->clear();
//
//            return;
//        }
//
//        $unitOfWork = $this->entityManager->getUnitOfWork();
//        $entities = $unitOfWork->getIdentityMap()[$entityName] ?? [];
//
//        foreach ($entities as $entity) {
//            $this->entityManager->detach($entity);
//        }
//    }
//
////    public function entityManager(): EntityManagerInterface
////    {
////        return $this->entityManager;
////    }
//
//
//    public function getRepository(string $entity): EntityRepository
//    {
//        return $this->entityManager->getRepository($entity);
//    }
}