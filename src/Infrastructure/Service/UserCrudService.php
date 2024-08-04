<?php
declare(strict_types=1);

namespace App\Infrastructure\Service;

use App\Application\Dto\UserDto;
use App\Application\User\UserCrudServiceInterface;
use App\Domain\Entity\UserEntity;
use App\Domain\Repository\UserRepositoryInterface;


class UserCrudService implements UserCrudServiceInterface
{

    public function __construct(private readonly UserRepositoryInterface $userRepository)
    {
    }

    public function create(UserDto $userDto): ?UserEntity
    {
        try {
            $user = new UserEntity();
            $user->setName($userDto->getName());
            $user->setEmail($userDto->getEmail());
            $user->setPassword($userDto->getPassword());
            $user->setCreatedAt(new \DateTime('now'));
            $this->userRepository->create($user);

            return $user;

        } catch (\Exception $exception) {
            echo $exception->getMessage();
            return null;
        }
    }

    public function update(int $id, UserDto $userDto): ?UserEntity
    {
        try {
            $user = $this->userRepository->findById($id);
            if ($user) {
                $user->setName($userDto->getName());
                $user->setEmail($userDto->getEmail());
                $user->setPassword($userDto->getPassword());
                $user->setUpdatedAt(new \DateTime('now'));
                $this->userRepository->update($user);

                return $user;
            }
        } catch (\Exception $exception) {
            // Optionally, log the exception or handle it accordingly
            return null; // Return null or throw a custom exception
        }

        return null;
    }

    public function delete(int $id): bool
    {
        try {
            $user = $this->userRepository->findById($id);
            if ($user) {
                $this->userRepository->delete($user);
                return true;
            }
        } catch (\Exception $exception) {
            // Optionally, log the exception or handle it accordingly
            return false; // Return null or throw a custom exception
        }

        return false;

    }
}