<?php

namespace Unit;

use App\Application\Dto\RoleDto;
use App\Application\Dto\UserDto;
use App\Domain\Entity\RoleEntity;
use App\Domain\Entity\UserEntity;
use App\Domain\Repository\RoleRepositoryInterface;
use App\Domain\Repository\UserRepositoryInterface;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\ORM\Tools\ToolsException;
use Tests\BaseTestCase;

class RoleTest extends BaseTestCase
{
    /**
     * @throws ToolsException
     */
    public function setUp(): void
    {

        $container = self::getContainer();

        $this->entityManager = $container->get(EntityManagerInterface::class);
        $this->roleRepository = $container->get(RoleRepositoryInterface::class);
        $this->userRepository = $container->get(UserRepositoryInterface::class);

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


    public function testFindRoleByName(){
        $this->assertTrue(true);
    }

    public function testFindRoleById(){
        $this->assertTrue(true);
    }
}