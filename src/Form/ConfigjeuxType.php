<?php

namespace App\Form;

use App\Entity\Configjeux;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConfigjeuxType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('critere')
            ->add('niveau')
            ->add('idparent')
            ->add('pourcentage')
            ->add('formule')
            ->add('coeftour')
            ->add('coefhistour')
            ->add('actif')
            ->add('idjeux')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Configjeux::class,
        ]);
    }
}
