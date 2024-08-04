<?php

declare(strict_types=1);

namespace App\Domain\Entity;

use App\Infrastructure\Repository\RoleRepository;
use DateTime;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

//#[ORM\Table(
//    name: "role",
//    indexes: [new ORM\Index(columns: ["parent_id"], name: "idx_role_parent_id")],
//    uniqueConstraints: [new ORM\UniqueConstraint(name: "idx_role_name", columns: ["name"])]
//)]

#[ORM\Entity(repositoryClass: RoleRepository::class)]
#[ORM\HasLifecycleCallbacks]
class RoleEntity
{
    #[ORM\Column(name: "id", type: "integer", nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    private int $id;

    #[ORM\Column(name: "name", type: "string", length: 50, nullable: false)]
    private string $name;

    #[ORM\Column(name: "status", type: "boolean", nullable: false)]
    private bool $status = true;

    #[ORM\Column(name: "created_at", type: "datetime_immutable", nullable: true)]
    private ?DateTimeImmutable $createdAt;

    #[ORM\Column(name: "updated_at", type: "datetime_immutable", nullable: true)]
    private ?DateTimeImmutable $updatedAt;

    #[ORM\Column(name: "description", type: "string", nullable: true)]
    private ?string $description;

    #[ORM\ManyToMany(targetEntity: UserEntity::class, mappedBy: 'roles')]
    private Collection $users;

    #[ORM\ManyToMany(targetEntity: PermissionEntity::class, mappedBy: 'permissions')]
    private Collection $permissions;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->permissions = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function isStatus(): bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): void
    {
        $this->status = $status;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeImmutable $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): ?DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?DateTimeImmutable $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(UserEntity $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addRole($this);
        }

        return $this;
    }

    public function removeUser(UserEntity $user): self {
        if ($this->users->removeElement($user)) {
            $user->removeRole($this);
        }
        return $this;
    }

    public function getPermissions(): Collection
    {
        return $this->permissions;
    }

    public function addPermission(PermissionEntity $permission): self
    {
        if (!$this->permissions->contains($permission)) {
            $this->permissions[] = $permission;
            $permission->addRole($this);
        }

        return $this;
    }

    public function removePermission(PermissionEntity $permission): self {
        if ($this->permissions->removeElement($permission)) {
            $permission->removeRole($this);
        }
        return $this;
    }

    #[ORM\PrePersist]
    public function prePersist(): void
    {
        $this->createdAt = new DateTimeImmutable();
    }

    #[ORM\PreUpdate]
    public function preUpdate(): void
    {
        $this->updatedAt = new DateTimeImmutable();
    }
}