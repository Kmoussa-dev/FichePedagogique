<?php

namespace App\DataFixtures;

use App\Entity\Etudiant;
use App\Entity\Module;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create("fr_FR");
        for($i=1;$i<=4;$i++){
            $etudiant=new Etudiant();
            $etudiant->setNumeroEtu($i)
                ->setNom($faker->name())
                ->setPrenom($faker->name())
                ->setEmail($faker->email())
                ->setDateNaissance($faker->dateTimeThisYear())
                ->setTel($i)
                ->setAdresse($faker->sentence());
            $manager->persist($etudiant);
            for($j=1;$j<=4;$j++){
                $module=new Module();
                $module->setIdModule($faker->word())
                    ->setLibelle($faker->word())
                    ->setObligatoire("oui")
                    ->setCoefficient($j)
                    ->setNoteObtenue($j);
                $manager->persist($module);

            }


        }
        $manager->flush();
    }
}
