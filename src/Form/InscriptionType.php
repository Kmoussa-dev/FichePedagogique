<?php

namespace App\Form;

use App\Entity\Inscription;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class InscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
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
        ;
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Inscription::class,
        ]);
    }
}
