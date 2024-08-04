<?php

namespace Integration;

use App\Application\Access\RbacServiceInterface;
use App\Application\Access\RoleCrudServiceInterface;
use App\Application\Dto\RoleDto;
use App\Domain\Entity\RoleEntity;
use DI\DependencyException;
use DI\NotFoundException;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\ORM\Tools\ToolsException;
use Tests\BaseTestCase;

class RbacServiceTest extends BaseTestCase
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
        $this->rbacService = $container->get(RbacServiceInterface::class);

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

    public function testAddRole()
    {}

    public function testAttachPermissionToRole()
    {}

    public function testAttachChildRole()
    {}

    public function testAttachRoleToUser()
    {}

    public function testCheckForCyclicHierarchy()
    {}

}