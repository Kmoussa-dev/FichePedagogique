<?php

namespace App\Entity;

use App\Repository\MatiereRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MatiereRepository::class)
 */
class Matiere
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Module::class, inversedBy="matieres")
     */
    private $idMatiere;

    /**
     * @ORM\ManyToOne(targetEntity=Module::class, inversedBy="matiereNom")
     *
     */
    private $nomMatiere;

    /**
     * @ORM\ManyToOne(targetEntity=Module::class, inversedBy="matiereObligatoire")
     */
    private $matiereObligatoire;

    /**
     * @ORM\ManyToOne(targetEntity=Module::class, inversedBy="matiereNote")
     */
    private $note;

    /**
     * @ORM\ManyToOne(targetEntity=Module::class, inversedBy="matiereCoef")
     */
    private $coefficientMatiere;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdMatiere(): ?Module
    {
        return $this->idMatiere;
    }

    public function setIdMatiere(?Module $idMatiere): self
    {
        $this->idMatiere = $idMatiere;

        return $this;
    }

    public function getNomMatiere(): ?Module
    {
        return $this->nomMatiere;
    }

    public function setNomMatiere(?Module $nomMatiere): self
    {
        $this->nomMatiere = $nomMatiere;

        return $this;
    }

    public function getMatiereObligatoire(): ?Module
    {
        return $this->matiereObligatoire;
    }

    public function setMatiereObligatoire(?Module $matiereObligatoire): self
    {
        $this->matiereObligatoire = $matiereObligatoire;

        return $this;
    }

    public function getNote(): ?Module
    {
        return $this->note;
    }

    public function setNote(?Module $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getCoefficientMatiere(): ?Module
    {
        return $this->coefficientMatiere;
    }

    public function setCoefficientMatiere(?Module $coefficientMatiere): self
    {
        $this->coefficientMatiere = $coefficientMatiere;

        return $this;
    }



}
