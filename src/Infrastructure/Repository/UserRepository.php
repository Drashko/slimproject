<?php

namespace App\Infrastructure\Repository;

use App\Domain\Entity\UserEntity;
use App\Domain\Repository\UserRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;


class UserRepository extends EntityRepository implements UserRepositoryInterface
{

    public function __construct(EntityManagerInterface $em, ClassMetadata $class)
    {
        parent::__construct($em, $class);
    }

    public function findById($id): ?UserEntity
    {
        return $this->_em->find(UserEntity::class, $id);
    }

    /**
     * @throws NonUniqueResultException
     * @throws NoResultException
     */
    public function findByEmail(string $email): ?UserEntity
    {
        //works
        $queryBuilder = $this->_em->createQueryBuilder()
            ->select('u')
            ->from(UserEntity::class, 'u');
        return  $queryBuilder->getQuery()->getSingleResult();
        //works
        // return $this->_em->getRepository(UserEntity::class)->findOneBy(['email' => $email]);
        //works
//        $query = $this->_em->createQuery('SELECT u FROM App\Domain\Entity\UserEntity u WHERE u.email = :email')->setParameter('email', $email);
//        return $query->getOneOrNullResult();

    }

    //todo add filer params in where clause
    public function list(?array $params): ?array
    {

     //todo implements
        return [];

    }
}