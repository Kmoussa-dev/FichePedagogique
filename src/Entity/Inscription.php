<?php

namespace App\Entity;

use App\Repository\InscriptionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InscriptionRepository::class)
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
     * @ORM\Column(type="datetime")
     */
    private $dateInscription;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $regimeRSE;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $redoublant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tierTemps;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getRegimeRSE(): ?string
    {
        return $this->regimeRSE;
    }

    public function setRegimeRSE(string $regimeRSE): self
    {
        $this->regimeRSE = $regimeRSE;

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

    public function getTierTemps(): ?string
    {
        return $this->tierTemps;
    }

    public function setTierTemps(string $tierTemps): self
    {
        $this->tierTemps = $tierTemps;

        return $this;
    }
}
