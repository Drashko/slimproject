<?php

namespace Unit;

use App\Domain\Entity\UserEntity;
use App\Domain\Repository\UserRepositoryInterface;
use App\Infrastructure\ORM\EntityManagerAdapterServiceInterface;
use App\Infrastructure\Repository\UserRepository;
use DI\ContainerBuilder;
use DI\DependencyException;
use DI\NotFoundException;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\ORM\Tools\ToolsException;
use PHPUnit\Framework\TestCase;
use Slim\Factory\AppFactory;
use Tests\BaseTestCase;

class UserTest extends BaseTestCase
{

    /**
     * @throws DependencyException
     * @throws ToolsException
     * @throws NotFoundException
     * @throws \Exception
     */
    public function setUp(): void
    {

        $this->container = self::getContainer();

        $this->entityManager = $this->container->get(EntityManagerInterface::class);
        $this->userRepository = $this->container->get(UserRepositoryInterface::class);

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

    //add, delete , update ...
    public function testCreateUser(){

        $user = new UserEntity();
        $user->setName('John Doe');
        $user->setPassword('122565yup');
        $user->setEmail('john@example.com');
        $user->setCreatedAt(new \DateTime('now'));

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        $userFromDb = $this->userRepository->findById($user->getId());

        $this->assertInstanceOf(UserEntity::class, $userFromDb);
        $this->assertEquals('John Doe', $userFromDb->getName());
        $this->assertEquals('john@example.com', $userFromDb->getEmail());
    }
}