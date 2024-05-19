<?php

namespace App\Infrastructure\Repository;

use App\Domain\User\UserEntity;
use App\Domain\User\UserRepositoryInterface;
use App\Infrastructure\ORM\EntityManagerServiceInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NonUniqueResultException;

class UserRepository implements UserRepositoryInterface
{

    public function __construct(public  EntityManagerServiceInterface $entityManagerService)
    {
    }

    /**
     * @throws NonUniqueResultException
     */
    public function findById($id): ?UserEntity
    {
        $query = $this->entityManagerService->entityManager()->createQuery('Select u from App\Domain\User\UserEntity u WHERE u.id = :id');
        $query->setParameter('id', $id);
        return $query->getOneOrNullResult();
    }

    /**
     * @throws NonUniqueResultException
     */
    public function findByEmail(string $email): UserEntity
    {
        $query = $this->entityManagerService->entityManager()->createQuery('Select u from App\Domain\User\UserEntity u WHERE u.email = :email');
        $query->setParameter('email', $email);
        return $query->getOneOrNullResult();
    }

    //todo add filer params in where clause
    public function list(array $params): array
    {
//      $builder = $this->entityManagerService->entityManager()->createQueryBuilder();
//       return $builder->getQuery()->getResult();
     $query = $this->entityManagerService->entityManager()->createQuery('Select u from App\Domain\User\UserEntity u');

      return $query->getResult();

    }
}