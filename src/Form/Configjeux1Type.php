<?php

namespace App\Form;

use App\Entity\Configjeux;
use App\Entity\Jeux;
use App\Repository\JeuxRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class Configjeux1Type extends AbstractType
{
    private $jeuxRepository;

    public function __construct(JeuxRepository $jeuxRepository)
    {
        $this->jeuxRepository = $jeuxRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //$j = new JeuxRepository();
        $listjeux =   $this->jeuxRepository->findAll();
        //dd($listjeux);
        $builder
            ->add('critere')
            ->add('niveau')
            ->add('pourcentage')
            ->add('formule')
            ->add('coeftour')
            ->add('coefhistour')
            ->add('actif')
            // ->add('idjeux', ChoiceType::class, [
            //     'choices'  => [
            //         'Maybe' => null,
            //         'Yes' => true,
            //         'No' => false,
            //     ]
            // ])
            // ->add('idjeux')
            ->add('idjeux', ChoiceType::class, [
                'choices' => $listjeux,
                // "name" is a property path, meaning Symfony will look for a public
                // property or a public method like "getName()" to define the input
                // string value that will be submitted by the form
                'choice_value' => 'id',
                // a callback to return the label for a given choice
                // if a placeholder is used, its empty value (null) may be passed but
                // its label is defined by its own "placeholder" option
                'choice_label' => function (?Jeux $jeux) {
                    return $jeux ? $jeux->getLibelle() : '';
                },

            ])
            ->add('parent');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Configjeux::class,
        ]);
    }
}
