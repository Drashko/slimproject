<?php

namespace App\Domain\Entity;
use App\Infrastructure\Repository\RoleHierarchyRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Table(
    name: "role_hierarchy",
    indexes: [
        new ORM\Index(columns: ["child_role_id"], name: "fk_role_hierarchy_child"),
        new ORM\Index(columns: ["parent_role_id"], name: "fk_role_hierarchy_parent")
    ],
    uniqueConstraints: [new ORM\UniqueConstraint(name: "idx_role_hierarchy_unique", columns: ["parent_role_id", "child_role_id"])]
)]
#[ORM\Entity(repositoryClass: RoleHierarchyRepository::class)]
#[ORM\HasLifecycleCallbacks]
class RoleHierarchyEntity
{
    #[ORM\Column(name: "id", type: "integer", nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    private int $id;

    #[ORM\Column(name: "created_at", type: "datetime", nullable: false)]
    private DateTime $createdAt;

    #[ORM\Column(name: "parent_role_id", type: "integer", nullable: false)]
    private int $parentRoleId;

    #[ORM\Column(name: "child_role_id", type: "integer", nullable: false)]
    private int $childRoleId;

    #[ORM\ManyToOne(targetEntity: RoleEntity::class)]
    #[ORM\JoinColumn(name: "child_role_id", referencedColumnName: "id")]
    private RoleEntity $childRole;

    #[ORM\ManyToOne(targetEntity: RoleEntity::class)]
    #[ORM\JoinColumn(name: "parent_role_id", referencedColumnName: "id")]
    private RoleEntity $parentRole;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getChildRole(): RoleEntity
    {
        return $this->childRole;
    }

    public function setChildRole(RoleEntity $childRole): void
    {
        $this->childRole = $childRole;
    }

    public function getParentRole(): RoleEntity
    {
        return $this->parentRole;
    }

    public function setParentRole(RoleEntity $parentRole): void
    {
        $this->parentRole = $parentRole;
    }

    #[ORM\PrePersist]
    public function prePersist(): void
    {
        $this->createdAt = new DateTime();
    }
}