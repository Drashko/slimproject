<?php

namespace App\Domain\Factory;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Repository\RepositoryFactory;
use Psr\Container\ContainerInterface;

class ContainerAwareRepositoryFactory  implements RepositoryFactory
{
    private ContainerInterface $container;
    private array $repositoryList = [];

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function getRepository(EntityManagerInterface $entityManager, $entityName)
    {
        $metadata = $entityManager->getClassMetadata($entityName);

        // Check if the repository has already been created and cached
        if (isset($this->repositoryList[$entityName])) {
            return $this->repositoryList[$entityName];
        }

        // Check if there is a custom repository class defined
        $repositoryClassName = $metadata->customRepositoryClassName;
        if ($repositoryClassName !== null) {
            // Use the container to create the repository instance if available
            if ($this->container->has($repositoryClassName)) {
                $repository = $this->container->get($repositoryClassName);
            } else {
                // Fallback: Instantiate manually if not managed by the container
                $repository = new $repositoryClassName(
                    $entityManager,
                    $metadata
                );
            }
        } else {
            // Default repository behavior
            $repository = $entityManager->getRepository($entityName);
        }

        $this->repositoryList[$entityName] = $repository;

        return $repository;
    }
}