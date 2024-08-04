<?php

namespace Integration;

use App\Application\Dto\UserDto;
use App\Application\User\UserCrudServiceInterface;
use App\Domain\Entity\UserEntity;
use App\Domain\Repository\UserRepositoryInterface;
use DI\DependencyException;
use DI\NotFoundException;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\ORM\Tools\ToolsException;
use Exception;
use Tests\BaseTestCase;

class UserCrudServiceTest extends BaseTestCase
{

    /**
     * @throws DependencyException
     * @throws ToolsException
     * @throws NotFoundException
     * @throws Exception
     */
    public function setUp(): void
    {

        $container = self::getContainer();

        $this->entityManager = $container->get(EntityManagerInterface::class);
        $this->userRepository = $container->get(UserRepositoryInterface::class);
        $this->userService = $container->get(UserCrudServiceInterface::class);

        $schemaTool = new SchemaTool($this->entityManager);
        $classes = $this->entityManager->getMetadataFactory()->getAllMetadata();
        $schemaTool->createSchema($classes);
    }

    protected function tearDown(): void
    {
        // Drop schema after test
        $schemaTool = new SchemaTool($this->entityManager);
        $classes = $this->entityManager->getMetadataFactory()->getAllMetadata();
        $schemaTool->dropSchema($classes);
    }


    public function testCreateUser() : void
    {
       $userDto = UserDto::create('test name', 'test@test.com', '12415432');
       $user = $this->userService->create($userDto);
       self::assertInstanceOf(UserEntity::class, $user);
       self::assertEquals('test name', $user->getName());
    }

    public function testUpdateUser(): void
    {
        $userDto = UserDto::create('test name', 'test@test.com', '12415432');
        $user = $this->userService->create($userDto);

        $userUpdateDto = UserDto::create('test name2', 'test@test.com', '12415432');

        $user = $this->userService->update($user->getId(), $userUpdateDto);

        self::assertInstanceOf(UserEntity::class, $user);
        self::assertEquals('test name2', $user->getName());
    }

    public function testDeleteUser(): void
    {
        $userDto = UserDto::create('test name', 'test@test.com', '12415432');
        $user = $this->userService->create($userDto);

        $deleted = $this->userService->delete($user->getId());

        $this->assertTrue($deleted);
    }


}