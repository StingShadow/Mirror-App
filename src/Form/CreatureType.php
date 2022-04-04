<?php

namespace App\Form;

use App\Entity\Creature;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreatureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom_creature')
            ->add('description_creature')
            ->add('habitat_creature')
            ->add('regime_creature')
            ->add('race')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Creature::class,
        ]);
    }
}
