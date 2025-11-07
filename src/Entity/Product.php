<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column]
    #[Groups(['product:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['product:read', 'product:write'])]
    private string $name;

    #[ORM\Column(type: 'datetime', nullable: true)]
    #[Groups(['product:read', 'product:write'])]
    private ?\DateTimeInterface $expirationDate = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Groups(['product:read', 'product:write'])]
    private ?int $quantity = null;

    #[ORM\Column(length: 100, nullable: true)]
    #[Groups(['product:read', 'product:write'])]
    private ?string $category = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    #[Groups(['product:read', 'product:write'])]
    private ?\DateTimeInterface $restockDate = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['product:read', 'product:write'])]
    private ?string $supplier = null;

    public function getSupplier(): ?string
    {
        return $this->supplier;
    }

    public function setSupplier(string $supplier): static
    {
        $this->supplier = $supplier;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getExpirationDate(): ?\DateTimeInterface
    {
        return $this->expirationDate;
    }

    public function setExpirationDate(\DateTimeInterface $expirationDate): static
    {
        $this->expirationDate = $expirationDate;

        return $this;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(?string $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getRestockDate(): ?\DateTimeInterface
    {
        return $this->restockDate;
    }

    public function setRestockDate(\DateTimeInterface $restockDate): static
    {
        $this->restockDate = $restockDate;

        return $this;
    }

}
