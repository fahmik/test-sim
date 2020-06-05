<?php

namespace App\Form;

use App\Entity\Paramdecision;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ParamdecisionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('parametre')
            ->add('valeurinit')
            ->add('augmtour')
            ->add('idconfig')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Paramdecision::class,
        ]);
    }
}
