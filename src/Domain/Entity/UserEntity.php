<?php

namespace App\Domain\Entity;

use App\Infrastructure\Repository\UserRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

#[ORM\Table(name: 'user')]
#[ORM\Entity(repositoryClass: UserRepository::class)]
class UserEntity
{
    #[Id]
    #[Column(type: 'integer')]
    #[GeneratedValue]
    private int|null $id = null;

    #[Column(type: 'string')]
    private string $name;

    #[Column(type: 'string')]
    private string $email;

    #[Column(type: 'string')]
    private string $password;

    #[Column(name: 'created_at', type: 'datetime')]
    private ?DateTime $createdAt;

    #[Column(name: 'updated_at', type: 'datetime', nullable: true)]
    private ?DateTime $updatedAt;

    #[ORM\ManyToMany(targetEntity: RoleEntity::class, inversedBy: 'users')]
    #[ORM\JoinTable(name: 'user_roles')]
    private Collection $roles;

    public function __construct()
    {
        $this->roles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
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

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): ?DateTime{
        return $this->updatedAt;
    }

    public function setUpdatedAt(?DateTime $updatedAt): void{
        $this->updatedAt = $updatedAt;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return Collection
     */
    public function getRoles(): Collection
    {
        return $this->roles;
    }

    public function addRole(RoleEntity $role): self
    {
        if (!$this->roles->contains($role)) {
            $this->roles[] = $role;
            $role->addUser($this);
        }

        return $this;
    }

    public function removeRole(RoleEntity $role): self
    {
        if ($this->roles->removeElement($role)) {
            $role->removeUser($this);
        }

        return $this;
    }

    #[ORM\PrePersist]
    public function prePersist(): void
    {
        $this->createdAt = new DateTime();
    }

    #[ORM\PreUpdate]
    public function preUpdate(): void {
        $this->updatedAt = new DateTime();
    }


}