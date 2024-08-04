<?php

namespace Integration;

use App\Application\Access\RoleCrudServiceInterface;
use App\Application\Dto\RoleDto;
use App\Application\User\UserCrudServiceInterface;
use App\Domain\Entity\RoleEntity;
use App\Domain\Repository\RoleRepositoryInterface;
use App\Domain\Repository\UserRepositoryInterface;
use App\Infrastructure\ORM\EntityManagerAdapterAdapterService;
use App\Infrastructure\ORM\EntityManagerAdapterServiceInterface;
use DI\DependencyException;
use DI\NotFoundException;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\ORM\Tools\ToolsException;
use Exception;
use Tests\BaseTestCase;

class RoleServiceTest extends BaseTestCase
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
        $this->roleService = $container->get(RoleCrudServiceInterface::class);

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
    {

        $roleName = 'Admin';
        $description = 'test';

        $role = $this->roleService->create($roleName, $description);

        $this->assertInstanceOf(RoleEntity::class, $role);
        $this->assertEquals('Admin', $role->getName());
    }

    public function testUpdateRole()
    {

        $roleName = 'Admin';
        $description = 'test';

        $role = $this->roleService->create($roleName,$description);

        $updateRoleName = 'Admin2';
        $updatedDescription = 'test description';

        $updatedRole = $this->roleService->update($role->getId(), $updateRoleName, $updatedDescription);

        $this->assertInstanceOf(RoleEntity::class, $updatedRole);
        $this->assertEquals('Admin2', $updatedRole->getName());
    }

}