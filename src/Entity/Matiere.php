<?php

namespace App\Entity;

use App\Repository\MatiereRepository;
use App\Repository\InscriptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MatiereRepository", repositoryClass=MatiereRepository::class)
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
     * @ORM\Column(type="float")
     */
    private $noteObtenue;

    /**
     * @ORM\ManyToOne(targetEntity=Module::class, inversedBy="matieres")
     */
    private $idMatiere;

    /**
     * @ORM\ManyToOne(targetEntity=Module::class, inversedBy="matiereNom")
     */
    private $nomMatiere;

    /**
     * @ORM\ManyToOne(targetEntity=Module::class, inversedBy="matiereObligatoire")
     */
    private $matiereObligatoire;

    /**
     * @ORM\ManyToOne(targetEntity=Module::class, inversedBy="matiereCoefficient")
     */
    private $coefficientMatiere;

    /**
     * @ORM\ManyToOne(targetEntity=Inscription::class, inversedBy="matieres")
     */
    private $numeroEtudiant;

    /**
     * @ORM\OneToMany(targetEntity=Inscription::class, mappedBy="affiche")
     */
    private $inscriptions;


    public function __construct()
    {
        $this->inscriptions = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
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

    public function getCoefficientMatiere(): ?int
    {
        return $this->coefficientMatiere;
    }

    public function setCoefficientMatiere(int $coefficientMatiere): self
    {
        $this->coefficientMatiere = $coefficientMatiere;

        return $this;
    }

    public function getNumeroEtudiant(): ?Inscription
    {
        return $this->numeroEtudiant;
    }

    public function setNumeroEtudiant(?Inscription $numeroEtudiant): self
    {
        $this->numeroEtudiant = $numeroEtudiant;

        return $this;
    }
    public function __toString()
    {
        return (string) $this->getNomMatiere();
    }

    /**
     * @return Collection|Inscription[]
     */
    public function getInscriptions(): Collection
    {
        return $this->inscriptions;
    }

    public function addInscription(Inscription $inscription): self
    {
        if (!$this->inscriptions->contains($inscription)) {
            $this->inscriptions[] = $inscription;
            $inscription->setAffiche($this);
        }

        return $this;
    }

    public function removeInscription(Inscription $inscription): self
    {
        if ($this->inscriptions->removeElement($inscription)) {
            // set the owning side to null (unless already changed)
            if ($inscription->getAffiche() === $this) {
                $inscription->setAffiche(null);
            }
        }

        return $this;
    }








}
