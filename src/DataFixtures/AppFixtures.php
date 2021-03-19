<?php

namespace App\DataFixtures;

use App\Entity\Etudiant;
use App\Entity\Inscription;
use App\Entity\Module;
use App\Entity\Parcours;
use App\Entity\Semestre;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('moi@moi.fr')
            ->setRoles(['ROLE_ADMIN'])
            ->setPassword($this->passwordEncoder->encodePassword($user, 'moi'));
        $manager->persist($user);
        $faker = \Faker\Factory::create("fr_FR");

        for ($i = 1; $i <= 3; $i++) {
            $user = new User();
            $user->setEmail($faker->email)
                ->setPassword($this->passwordEncoder->encodePassword($user, 'tonton'));
            $manager->persist($user);
        }
        for ($k = 1; $k <= 6; $k++) {
            $semestre = new Semestre();
            $semestre->setNumeroSemestre((string)'Semestre' . $k);
            $manager->persist($semestre);
        }
            for ($k = 1; $k <= 6; $k++) {
                $parcours = new Parcours();
                $parcours->setNiveau((string)'L' . $k);
                $manager->persist($parcours);
            }for ($k = 1; $k <= 6; $k++) {
                $module = new Module();
                $module->setIdModule((string)'M' . $k)
                    ->setLibelle("m".$k)
                    ->setObligatoire("oui")
                    ->setCoefficient($k);
                $manager->persist($module);
            }
        /**
         * for($i=1;$i<=4;$i++) {
        $inscription = new Inscription();
        $inscription->setNumeroEtu($i)
        ->setNom($faker->name())
        ->setPrenom($faker->name())
        ->setEmail($faker->email())
        ->setDateNaissance($faker->dateTime())
        ->setTel($faker->$i)
        ->setAdresse($faker->address())
        ->setDateInscription($faker->dateTime())
        ->setRedoublant('oui')
        ->setRegimeRSE('non')
        ->setTierTemps('oui')
        ;

        for ($j = 1; $j <= 4; $j++) {
        $module = new Module();
        $module->setIdModule($faker->word())
        ->setLibelle($faker->word())
        ->setObligatoire("oui")
        ->setCoefficient($j);

        $manager->persist($module);

        }

        $manager->persist($inscription);
        }
        for ($k = 1; $k <= 6; $k++) {
        $semestre = new Semestre();
        $semestre->setNumeroSemestre((string)'Semestre' . $k);
        $manager->persist($semestre);
        }

         */

            $manager->flush();
        }

}
