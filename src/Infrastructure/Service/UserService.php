<?php
declare(strict_types=1);

namespace App\Infrastructure\Service;

use App\Application\Dto\UserDto;
use App\Application\User\UserServiceInterface;
use App\Domain\Entity\UserEntity;
use App\Domain\Repository\UserRepositoryInterface;
use App\Infrastructure\ORM\EntityManagerAdapterServiceInterface;
use Doctrine\ORM\EntityManagerInterface;


class UserService implements UserServiceInterface
{

    public function __construct(
        private readonly UserRepositoryInterface     $userRepository,
        private readonly EntityManagerInterface $entityManager
    )
    {
    }

    public function list(?array $params): array
    {
        return $this->userRepository->list($params);
    }


    public function create(UserDto $user): UserEntity
    {
        $userEntity = new UserEntity();
        $userEntity->setName($user->getName());
        $userEntity->setPassword($user->getPassword());
        $userEntity->setEmail($user->getEmail());

        $this->entityManager->persist($userEntity);
        $this->entityManager->flush();

        return $userEntity;
    }

    public function update(int $id, UserDto $user): UserEntity
    {
        $userEntity = $this->userRepository->findById($id);
        if ($userEntity) {
            $userEntity->setEmail($user->getEmail());
            $userEntity->setName($user->getName());
            $userEntity->setPassword($user->getPassword());
        }

        $this->entityManager->persist($userEntity);
//        $this->entityManager->flush();todo check if flush is needed on update

        return $userEntity;

    }

    public function delete(int $userId): bool
    {
        $userEntity = $this->userRepository->findById($userId);

        if ($userEntity) {
            $this->entityManager->remove($userEntity);
            return true;
        }

        return false;
    }
}