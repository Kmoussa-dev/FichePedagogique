<?php

namespace App\Form;

use App\Entity\Inscription;
use App\Entity\Semestre;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('dateNaissance', DateType::class, array(
                'required' => true,
                'widget' => 'single_text',
                'attr' => [
                    'type' => 'text',
                    'class' => 'form-control input-inline datepicker',
                    'data-provide' => 'datepicker',
                ],
                'html5' => true,
            ))

            ->add('email')
            ->add('tel', NumberType::class, array(
                'required' => true,
                'attr' => [
                    'type' => 'text',
                    'class' => 'form-control input-inline datepicker',
                    'data-provide' => 'numberpicker',
                ],
                'html5' => true,
            ))
            ->add('adresse')
            ->add('numeroEtu', NumberType::class, array(
                'required' => true,
                'attr' => [
                    'type' => 'text',
                    'class' => 'form-control input-inline datepicker',
                    'data-provide' => 'numberpicker',
                ],
                'html5' => true,
            ))
            ->add('dateInscription', DateTimeType::class, array(
                'required' => true,
                'widget' => 'single_text',
                'attr' => [
                    'type' => 'text',
                    'class' => 'form-control input-inline datetimepicker',
                    'data-provide' => 'datetimepicker',
                ],
                'html5' => true,
            ))
            ->add('regimeRSE', ChoiceType::class, [
                'choices' => [
                    'oui' => 'Oui',

                    'non' => 'Non',
                ],
                'expanded'=>true

            ])
            ->add('redoublant', ChoiceType::class, [
                'choices' => [
                    'oui' => 'Oui',

                    'non' => 'Non',
                ],
                'expanded'=>true

            ])
            ->add('tierTemps', ChoiceType::class, [
                'choices' => [
                    'oui' => 'Oui',

                    'non' => 'Non',
                ],
                'expanded'=>true

            ])
            ->add('typeControleChoisi', ChoiceType::class, [
                'choices' => [
                    'Terminal Uniquement' => 'Terminal Uniquement',

                    'Autre' => 'Autre',
                ],
                'expanded'=>true

            ])
            ->add('idSemestre', EntityType::class, [
                'class' => Semestre::class,
                'choice_label' => 'numeroSemestre'
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Inscription::class,
        ]);
    }
}
