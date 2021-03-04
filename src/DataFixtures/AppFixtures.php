<?php

namespace App\DataFixtures;

use App\Entity\Etudiant;
use App\Entity\Module;
use App\Entity\Semestre;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {


        $manager->flush();
    }
}
