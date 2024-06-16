<?php

namespace App\Infrastructure\Repository;

use App\Domain\Entity\UserEntity;
use App\Domain\Repository\UserRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\NonUniqueResultException;

class UserRepository implements UserRepositoryInterface
{

    public function __construct(public EntityManagerInterface $entityManager)
    {
    }

    /**
     * @throws NonUniqueResultException
     */
    public function findById($id): ?UserEntity
    {
        $query = $this->entityManager->createQuery('Select u from App\Domain\Entity\UserEntity u WHERE u.id = :id');
        $query->setParameter('id', $id);
        return $query->getOneOrNullResult();
    }

    /**
     * @throws NonUniqueResultException
     */
    public function findByEmail(string $email): UserEntity
    {
        $query = $this->entityManager->createQuery('Select u from App\Domain\Entity\UserEntity u WHERE u.email = :email');
        $query->setParameter('email', $email);
        return $query->getOneOrNullResult();
    }

    //todo add filer params in where clause
    public function list(?array $params): array
    {

        //dump($params);
//      $builder = $this->entityManagerService->entityManager()->createQueryBuilder();
//       return $builder->getQuery()->getResult();
        $query = $this->entityManager->createQuery('Select u from App\Domain\Entity\UserEntity u');

        return $query->getResult();

    }
}