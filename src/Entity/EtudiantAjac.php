<?php


namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

class EtudiantAjac
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne (targetEntity="Inscription")
     *
     */
    private $lesAjac;

    /**
     * @return mixed
     */
    public function getLesAjac()
    {
        return $this->lesAjac;
    }

    /**
     * @param mixed $lesAjac
     */
    public function setLesAjac($lesAjac): void
    {
        $this->lesAjac = $lesAjac;
    }









}