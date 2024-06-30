<?php

namespace Integration;

use App\Application\Dto\UserDto;
use App\Application\User\UserServiceInterface;
use App\Domain\Entity\UserEntity;
use App\Domain\Repository\UserRepositoryInterface;
use App\Infrastructure\Service\UserService;
use DI\Container;
use DI\DependencyException;
use DI\NotFoundException;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\ORM\Tools\ToolsException;
use Exception;
use JetBrains\PhpStorm\NoReturn;
use PHPUnit\Framework\TestCase;
use Tests\BaseTestCase;

class UserServiceTest extends BaseTestCase
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

        $this->userService = $container->get(UserServiceInterface::class);

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


    public function testCreateUser() : UserEntity
    {
        $userDto = UserDto::create('test', 'dr@gmail.com', '12345664');
        $newUser = $this->userService->create($userDto);
        $this->assertInstanceOf(UserEntity::class, $newUser);
        $this->assertEquals('test', $newUser->getName());
        $this->assertEquals('dr@gmail.com', $newUser->getEmail());

        return $newUser;
    }


    public function testUpdateUser(): void{

        $userDto = UserDto::create('test', 'dr@gmail.com', '12345664');
        $newUser = $this->userService->create($userDto);

        $findUserByEmail = $this->userRepository->findByEmail($newUser->getEmail());

        $newUserDto = UserDto::create('test2', 'dr@gamail2.com', '12345664');
        $updatedUser = $this->userService->update($findUserByEmail->getId(), $newUserDto);
        $this->assertInstanceOf(UserEntity::class, $updatedUser);
        $this->assertEquals('test2', $updatedUser->getName());
    }
}