<?php

namespace Integration;

use App\Application\Dto\UserDto;
use App\Application\User\UserCrudServiceInterface;
use App\Domain\Entity\UserEntity;
use App\Domain\Repository\RoleRepositoryInterface;
use App\Domain\Repository\UserRepositoryInterface;
use App\Infrastructure\Service\AuthorizationService;
use DI\DependencyException;
use DI\NotFoundException;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\ORM\Tools\ToolsException;
use Exception;
use Tests\BaseTestCase;

class AuthorizationServiceTest extends BaseTestCase
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
        $this->userRepository = $container->get(RoleRepositoryInterface::class);
        $this->userService = $container->get(AuthorizationService::class);

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

    public function testHasAccess(){
        $this->assertTrue(true);
    }

}