<?php

namespace App\Entity;

use App\Repository\ModuleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ModuleRepository::class)
 */
class Module
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
    private $idModule;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $obligatoire;

    /**
     * @ORM\Column(type="float")
     */
    private $noteObtenue;

    /**
     * @ORM\Column(type="integer")
     */
    private $coefficient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdModule(): ?string
    {
        return $this->idModule;
    }

    public function setIdModule(string $idModule): self
    {
        $this->idModule = $idModule;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getObligatoire(): ?string
    {
        return $this->obligatoire;
    }

    public function setObligatoire(string $obligatoire): self
    {
        $this->obligatoire = $obligatoire;

        return $this;
    }

    public function getNoteObtenue(): ?float
    {
        return $this->noteObtenue;
    }

    public function setNoteObtenue(float $noteObtenue): self
    {
        $this->noteObtenue = $noteObtenue;

        return $this;
    }

    public function getCoefficient(): ?int
    {
        return $this->coefficient;
    }

    public function setCoefficient(int $coefficient): self
    {
        $this->coefficient = $coefficient;

        return $this;
    }



}
