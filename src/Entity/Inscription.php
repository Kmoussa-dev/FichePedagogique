<?php

namespace App\Entity;

use App\Repository\InscriptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InscriptionRepository", repositoryClass=InscriptionRepository::class)
 */
class Inscription
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="date")
     */
    private $dateNaissance;

    /**
     * @ORM\Column(type="integer")
     */
    private $numeroEtu;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="integer")
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateInscription;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $redoublant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $regimeRSE;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tierTemps;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typeControleChoisi;

    /**
     * @ORM\ManyToOne(targetEntity=Semestre::class, inversedBy="inscriptions")
     */
    private $idSemestre;

    /**
     * @ORM\OneToMany(targetEntity=Matiere::class, mappedBy="numeroEtudiant")
     */
    private $matieres;

    /**
     * @ORM\ManyToOne(targetEntity=Parcours::class, inversedBy="inscriptions")
     */
    private $idParcours;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ajac;

    /**
     * @ORM\OneToMany(targetEntity=Validation::class, mappedBy="numero")
     */
    private $validations;

    public function __construct()
    {
        $this->matieres = new ArrayCollection();
        $this->validations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getNumeroEtu(): ?int
    {
        return $this->numeroEtu;
    }

    public function setNumeroEtu(int $numeroEtu): self
    {
        $this->numeroEtu = $numeroEtu;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTel(): ?int
    {
        return $this->tel;
    }

    public function setTel(int $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getDateInscription(): ?\DateTimeInterface
    {
        return $this->dateInscription;
    }

    public function setDateInscription(\DateTimeInterface $dateInscription): self
    {
        $this->dateInscription = $dateInscription;

        return $this;
    }

    public function getRedoublant(): ?string
    {
        return $this->redoublant;
    }

    public function setRedoublant(string $redoublant): self
    {
        $this->redoublant = $redoublant;

        return $this;
    }

    public function getRegimeRSE(): ?string
    {
        return $this->regimeRSE;
    }

    public function setRegimeRSE(string $regimeRSE): self
    {
        $this->regimeRSE = $regimeRSE;

        return $this;
    }

    public function getTierTemps(): ?string
    {
        return $this->tierTemps;
    }

    public function setTierTemps(string $tierTemps): self
    {
        $this->tierTemps = $tierTemps;

        return $this;
    }

    public function getTypeControleChoisi(): ?string
    {
        return $this->typeControleChoisi;
    }

    public function setTypeControleChoisi(string $typeControleChoisi): self
    {
        $this->typeControleChoisi = $typeControleChoisi;

        return $this;
    }

    public function getIdSemestre(): ?Semestre
    {
        return $this->idSemestre;
    }

    public function setIdSemestre(?Semestre $idSemestre): self
    {
        $this->idSemestre = $idSemestre;

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
            $matiere->setNumeroEtudiant($this);
        }

        return $this;
    }

    public function removeMatiere(Matiere $matiere): self
    {
        if ($this->matieres->removeElement($matiere)) {
            // set the owning side to null (unless already changed)
            if ($matiere->getNumeroEtudiant() === $this) {
                $matiere->setNumeroEtudiant(null);
            }
        }

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (String) $this->getNumeroEtu();
    }

    public function getIdParcours(): ?Parcours
    {
        return $this->idParcours;
    }

    public function setIdParcours(?Parcours $idParcours): self
    {
        $this->idParcours = $idParcours;

        return $this;
    }

    public function getAjac(): ?string
    {
        return $this->ajac;
    }

    public function setAjac(string $ajac): self
    {
        $this->ajac = $ajac;

        return $this;
    }

    /**
     * @return Collection|Validation[]
     */
    public function getValidations(): Collection
    {
        return $this->validations;
    }

    public function addValidation(Validation $validation): self
    {
        if (!$this->validations->contains($validation)) {
            $this->validations[] = $validation;
            $validation->setNumero($this);
        }

        return $this;
    }

    public function removeValidation(Validation $validation): self
    {
        if ($this->validations->removeElement($validation)) {
            // set the owning side to null (unless already changed)
            if ($validation->getNumero() === $this) {
                $validation->setNumero(null);
            }
        }

        return $this;
    }



}
