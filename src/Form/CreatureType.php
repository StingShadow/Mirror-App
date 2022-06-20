<?php

namespace App\Form;

use App\Entity\Creature;
use App\Entity\Race;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class CreatureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom_creature')
            ->add('description_creature')
            ->add('habitat_creature', ChoiceType::class, [
                'choices' => [
                    'Plaine' => 'Plaine',
                    'Montagne' => 'Montagne',
                    'Souterrains' => 'Souterrains',
                    'Zone Enneigés' => 'Zone Enneigés',
                    'Forêt' => 'Forêt'
                ]
            ])
            ->add('regime_creature', ChoiceType::class, [
                'choices'  => [
                    'Omnivore' => 'Omnivore',
                    'Herbivore' =>'Herbivore',
                    'Carnivore' => "Carnivore",
                    'Cristovore' => "Cristovore"
                ]
            ])
            ->add('race', EntityType::class,[
                'class' => Race::class,
                'choice_label' => 'nom_race',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Creature::class,
        ]);
    }
}
