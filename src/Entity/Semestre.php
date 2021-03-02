<?php

namespace App\Entity;

use App\Repository\SemestreRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SemestreRepository::class)
 */
class Semestre
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
    private $numeroSemestre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroSemestre(): ?string
    {
        return $this->numeroSemestre;
    }

    public function setNumeroSemestre(string $numeroSemestre): self
    {
        $this->numeroSemestre = $numeroSemestre;

        return $this;
    }
}
