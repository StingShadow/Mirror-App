<?php

namespace App\Form;

use App\Entity\SourcePouvoir;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SourcePouvoirType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomSource')
            ->add('caracteristique')
            ->add('src')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SourcePouvoir::class,
        ]);
    }
}
