<?php

namespace App\Entity;

use App\Repository\ModuleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\OneToMany(targetEntity=Matiere::class, mappedBy="idMatiere")
     */
    private $matieres;

    /**
     * @ORM\OneToMany(targetEntity=Matiere::class, mappedBy="nomMatiere")
     */
    private $matiereNom;

    /**
     * @ORM\OneToMany(targetEntity=Matiere::class, mappedBy="matiereObligatoire")
     */
    private $matiereObligatoire;

    /**
     * @ORM\OneToMany(targetEntity=Matiere::class, mappedBy="note")
     */
    private $matiereNote;

    /**
     * @ORM\OneToMany(targetEntity=Matiere::class, mappedBy="coefficientMatiere")
     */
    private $matiereCoef;

    public function __construct()
    {
        $this->matieres = new ArrayCollection();
        $this->matiereNom = new ArrayCollection();
        $this->matiereObligatoire = new ArrayCollection();
        $this->matiereNote = new ArrayCollection();
        $this->matiereCoef = new ArrayCollection();
    }


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

    /**
     * @return Collection|Matiere[]
     */
    public function getMatieres(): Collection
    {
        return $this->matieres;
    }

    public function addMatiere(Matiere $matiere): self
    {
        if (!$this->matieres->contains($matiere)) {
            $this->matieres[] = $matiere;
            $matiere->setIdMatiere($this);
        }

        return $this;
    }

    public function removeMatiere(Matiere $matiere): self
    {
        if ($this->matieres->removeElement($matiere)) {
            // set the owning side to null (unless already changed)
            if ($matiere->getIdMatiere() === $this) {
                $matiere->setIdMatiere(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Matiere[]
     */
    public function getMatiereNom(): Collection
    {
        return $this->matiereNom;
    }

    public function addMatiereNom(Matiere $matiereNom): self
    {
        if (!$this->matiereNom->contains($matiereNom)) {
            $this->matiereNom[] = $matiereNom;
            $matiereNom->setNomMatiere($this);
        }

        return $this;
    }

    public function removeMatiereNom(Matiere $matiereNom): self
    {
        if ($this->matiereNom->removeElement($matiereNom)) {
            // set the owning side to null (unless already changed)
            if ($matiereNom->getNomMatiere() === $this) {
                $matiereNom->setNomMatiere(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Matiere[]
     */
    public function getMatiereObligatoire(): Collection
    {
        return $this->matiereObligatoire;
    }

    public function addMatiereObligatoire(Matiere $matiereObligatoire): self
    {
        if (!$this->matiereObligatoire->contains($matiereObligatoire)) {
            $this->matiereObligatoire[] = $matiereObligatoire;
            $matiereObligatoire->setMatiereObligatoire($this);
        }

        return $this;
    }

    public function removeMatiereObligatoire(Matiere $matiereObligatoire): self
    {
        if ($this->matiereObligatoire->removeElement($matiereObligatoire)) {
            // set the owning side to null (unless already changed)
            if ($matiereObligatoire->getMatiereObligatoire() === $this) {
                $matiereObligatoire->setMatiereObligatoire(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Matiere[]
     */
    public function getMatiereNote(): Collection
    {
        return $this->matiereNote;
    }

    public function addMatiereNote(Matiere $matiereNote): self
    {
        if (!$this->matiereNote->contains($matiereNote)) {
            $this->matiereNote[] = $matiereNote;
            $matiereNote->setNote($this);
        }

        return $this;
    }

    public function removeMatiereNote(Matiere $matiereNote): self
    {
        if ($this->matiereNote->removeElement($matiereNote)) {
            // set the owning side to null (unless already changed)
            if ($matiereNote->getNote() === $this) {
                $matiereNote->setNote(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Matiere[]
     */
    public function getMatiereCoef(): Collection
    {
        return $this->matiereCoef;
    }

    public function addMatiereCoef(Matiere $matiereCoef): self
    {
        if (!$this->matiereCoef->contains($matiereCoef)) {
            $this->matiereCoef[] = $matiereCoef;
            $matiereCoef->setCoefficientMatiere($this);
        }

        return $this;
    }

    public function removeMatiereCoef(Matiere $matiereCoef): self
    {
        if ($this->matiereCoef->removeElement($matiereCoef)) {
            // set the owning side to null (unless already changed)
            if ($matiereCoef->getCoefficientMatiere() === $this) {
                $matiereCoef->setCoefficientMatiere(null);
            }
        }

        return $this;
    }
    public function __toString(): string
    {
        return $this->getIdModule();
    }
    public function __toString2(): string
    {
        return $this->getLibelle();
    }



}
