<?php

namespace App\Form;

use App\Entity\Inscription;
use App\Entity\Validation;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ValidationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numero', EntityType::class, [
                'class' => Inscription::class,
                'choice_label' => 'numeroEtu'
            ])
            ->add('estValide', ChoiceType::class, [
                'choices' => [
                    'oui' => 'Oui',

                    'non' => 'Non',
                ],
                'expanded'=>true

            ])
            ->add('description')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Validation::class,
        ]);
    }
}
