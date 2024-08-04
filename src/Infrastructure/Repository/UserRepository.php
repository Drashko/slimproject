<?php

namespace App\Infrastructure\Repository;

use App\Domain\Entity\UserEntity;
use App\Domain\Repository\UserRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;

class UserRepository extends EntityRepository implements UserRepositoryInterface
{

    public function __construct(private readonly EntityManagerInterface $entityManager, private readonly ClassMetadata $class)
    {
        parent::__construct($this->entityManager, $this->class);
    }

    public function findById($id): ?UserEntity
    {
        return $this->entityManager->getRepository(UserEntity::class)->find($id);
    }


    public function findOneByEmail(string $email): ?UserEntity
    {
        return $this->entityManager->getRepository(UserEntity::class)->findOneBy(['email' => $email]);
    }

    public function filtered(array $conditions): array
    {

        //todo implement
        //works
        $queryBuilder = $this->entityManager->getRepository(UserEntity::class)->createQueryBuilder('u')
            ->select('u')
            ->from(UserEntity::class, 'u');
        return  $queryBuilder->getQuery()->getSingleResult();
        //works
        // return $this->_em->getRepository(UserEntity::class)->findOneBy(['email' => $email]);
        //works
//        $query = $this->_em->createQuery('SELECT u FROM App\Domain\Entity\UserEntity u WHERE u.email = :email')->setParameter('email', $email);
//        return $query->getOneOrNullResult();
    }

    public function delete(UserEntity $userEntity): bool
    {
        $this->entityManager->remove($userEntity);

        return true;
    }

    public function create(UserEntity $userEntity): UserEntity
    {
        $this->entityManager->persist($userEntity);
        $this->entityManager->flush();

        return $userEntity;
    }

    public function update(UserEntity $userEntity): void
    {
        $this->entityManager->persist($userEntity);
        $this->entityManager->flush();
    }
}