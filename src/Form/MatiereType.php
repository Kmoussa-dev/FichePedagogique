<?php

namespace App\Form;

use App\Entity\Inscription;
use App\Entity\Matiere;
use App\Entity\Module;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MatiereType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numeroEtudiant', EntityType::class, [
                'class' => Inscription::class,
                'choice_label' => 'numeroEtu'
            ])

            ->add('idMatiere', EntityType::class, [
                'class' => Module::class,
                'choice_label' => 'idModule'
            ])
            ->add('nomMatiere', EntityType::class, [
                'class' => Module::class,
                'choice_label' => 'libelle'
            ])
            ->add('matiereObligatoire', EntityType::class, [
                'class' => Module::class,
                'choice_label' => 'obligatoire'
            ])
            ->add('noteObtenue')

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Matiere::class,
        ]);
    }
}
