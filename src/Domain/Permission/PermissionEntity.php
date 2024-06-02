<?php

namespace App\Domain\Permission;

use DateTime;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

/**
 * PermissionEntity
 *
 * @ORM\Table(
 *     name="permission",
 *     uniqueConstraints={@ORM\UniqueConstraint(name="idx_permission_name", columns={"name"})}
 * )
 * @ORM\Entity(repositoryClass="Potievdev\SlimRbac\Models\Repository\PermissionRepository")
 * @ORM\HasLifecycleCallbacks
 */
class PermissionEntity
{

    #[Id]
    #[Column(type: 'integer', nullable: false)]
    #[GeneratedValue(strategy: "IDENTITY")]
    private int|null $id = null;

    #[Column(type: 'string',length: 100, nullable: false)]
    private string $name;

    #[Column(type: 'boolean', nullable: false)]
    private string|bool $status = '1';

    /**
     * @var DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private DateTime $createdAt;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private DateTime $updatedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", nullable=true)
     */
    private string $description;

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

    public function setStatus(bool $status)
    {
        $this->status = $status;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /** @ORM\PrePersist  */
    public function prePersist()
    {
        $this->createdAt = new DateTime();
    }

    /** @ORM\PreUpdate  */
    public function preUpdate()
    {
        $this->updatedAt = new DateTime();
    }
}