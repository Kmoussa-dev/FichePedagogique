<?php

namespace App\Entity;

use App\Repository\ValidationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ValidationRepository::class)
 */
class Validation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $estValide;

    /**
     * @ORM\Column(type="text", length=255)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Inscription::class, inversedBy="validations")
     */
    private $numero;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEstValide(): ?string
    {
        return $this->estValide;
    }

    public function setEstValide(string $estValide): self
    {
        $this->estValide = $estValide;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getNumero(): ?Inscription
    {
        return $this->numero;
    }

    public function setNumero(?Inscription $numero): self
    {
        $this->numero = $numero;

        return $this;
    }
}
