<?php

namespace Unit;

use App\Domain\Repository\PermissionRepositoryInterface;
use App\Domain\Repository\UserRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\ORM\Tools\ToolsException;
use Tests\BaseTestCase;

class PermissionTest extends BaseTestCase
{
    /**
     * @throws ToolsException
     */
    public function setUp(): void
    {

        $container = self::getContainer();

        $this->entityManager = $container->get(EntityManagerInterface::class);
        $this->userRepository = $container->get(PermissionRepositoryInterface::class);

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

    public function testCreatePermission(){
        $this->assertTrue(true);
    }



}