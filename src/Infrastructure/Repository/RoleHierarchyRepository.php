<?php

namespace App\Infrastructure\Repository;

use App\Domain\Repository\RoleHierarchyRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Query\QueryException;

class RoleHierarchyRepository extends EntityRepository implements RoleHierarchyRepositoryInterface
{
    public function __construct(EntityManagerInterface $entityManager, ClassMetadata $class)
    {
        parent::__construct($entityManager, $class);
    }

    /**
     * @throws QueryException
     */
    public function hasChildRoleId(int $parentRoleId, int $findingChildId): bool
    {
        $childIds = $this->getChildIds([$parentRoleId]);

        if (count($childIds) > 0) {

            if (in_array($findingChildId, $childIds)) {
                return true;
            }

            foreach ($childIds as $childId) {

                if ($this->hasChildRoleId($childId, $findingChildId)) {
                    return true;
                }

            }
        }

        return false;
    }

    /**
     * @throws QueryException
     */
    public function getAllRoleIdsHierarchy(array $rootRoleIds): array
    {
        $childRoleIds = $this->getAllChildRoleIds($rootRoleIds);

        return array_merge($rootRoleIds, $childRoleIds);
    }

    /**
     * @throws QueryException
     */
    public function getAllChildRoleIds(array $parentIds): array
    {
        $allChildIds = [];

        while (count($parentIds) > 0) {
            $parentIds = $this->getChildIds($parentIds);
            $allChildIds = array_merge($allChildIds, $parentIds);
        };

        return $allChildIds;
    }

    /**
     * @throws QueryException
     */
    public function getChildIds(array $parentIds): array
    {
        $qb = $this->createQueryBuilder('roleHierarchy');

        $qb->select('roleHierarchy.childRoleId')
            ->where($qb->expr()->in( 'roleHierarchy.parentRoleId', $parentIds))
            ->indexBy('roleHierarchy', 'roleHierarchy.childRoleId');

        $childRoleIds =  $qb->getQuery()->getArrayResult();

        return array_keys($childRoleIds);
    }
}