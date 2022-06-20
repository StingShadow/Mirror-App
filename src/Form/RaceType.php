<?php

namespace App\Form;

use App\Entity\Classe;
use App\Entity\Race;
use App\Entity\SourcePouvoir;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RaceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomrace')
            ->add('histoire')
            ->add('caratere')
            ->add('caracteristique_physique')
            ->add('sourcePouvoir', EntityType::class, [
                'class' => SourcePouvoir::class,
                'choice_label' => 'nomSource',
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('croyances')
            ->add('capaciterace')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Race::class,
        ]);
    }
}
