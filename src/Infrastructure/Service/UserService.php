<?php
declare(strict_types=1);

namespace App\Infrastructure\Service;

use App\Application\UserServiceInterface;
use App\Domain\User\UserEntity;
use App\Domain\User\UserRepositoryInterface;
use App\Infrastructure\ORM\EntityManagerAdapterService;
use App\Infrastructure\ORM\EntityManagerServiceInterface;
use Dto\UserDto;

class UserService implements UserServiceInterface
{

    public function __construct(
        private readonly UserRepositoryInterface     $userRepository,
        private readonly EntityManagerServiceInterface $entityManagerService
    )
    {
    }

    public function list(array $params): array
    {
        return $this->userRepository->list($params);
    }


    public function create(UserDto $user): UserEntity
    {
        $userEntity = new UserEntity();
        $userEntity->setEmail($user->getEmail());
        $userEntity->setName($user->getFirstName());//todo add all methods to dto object and match them with UserEntity

        $this->entityManagerService->sync($userEntity);

        return $userEntity;
    }

    public function update(int $id, UserDto $user): UserEntity
    {
        $userEntity = $this->userRepository->findById($id);
        if ($userEntity) {
            $userEntity->setEmail($user->getEmail());
            $userEntity->setName($user->getFirstName());
        }

        $this->entityManagerService->sync($userEntity);

        return $userEntity;

    }

    public function delete(int $userId): bool
    {
        $userEntity = $this->userRepository->findById($userId);

        if ($userEntity) {
            $this->entityManagerService->sync($userEntity);
            return true;
        }

        return false;
    }
}