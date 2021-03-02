<?php

namespace App\Form;

use App\Entity\Etudiant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EtudiantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numeroEtu', NumberType::class, array(
                'required' => true,
                'attr' => [
                    'type' => 'text',
                    'class' => 'form-control input-inline datepicker',
                    'data-provide' => 'numberpicker',
                ],
                'html5' => true,
            ))
            ->add('nom')
            ->add('prenom')
            ->add('email')
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

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Etudiant::class,
        ]);
    }
}
