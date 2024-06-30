<?php

declare(strict_types=1);

namespace App\Domain\Entity;

use App\Infrastructure\Repository\RoleRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(
    name: "role",
    indexes: [new ORM\Index(columns: ["parent_id"], name: "idx_role_parent_id")],
    uniqueConstraints: [new ORM\UniqueConstraint(name: "idx_role_name", columns: ["name"])]
)]
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

    #[ORM\Column(name: "created_at", type: "datetime", nullable: false)]
    private DateTime $createdAt;

    #[ORM\Column(name: "updated_at", type: "datetime", nullable: true)]
    private ?DateTime $updatedAt;

    #[ORM\Column(name: "description", type: "string", nullable: true)]
    private ?string $description;

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

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?DateTime $updatedAt): void
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

    #[ORM\PrePersist]
    public function prePersist(): void
    {
        $this->createdAt = new DateTime();
    }

    #[ORM\PreUpdate]
    public function preUpdate(): void
    {
        $this->updatedAt = new DateTime();
    }
}