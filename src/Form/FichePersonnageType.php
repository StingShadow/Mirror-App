<?php

namespace App\Form;

use App\Entity\FichePersonnage;
use App\Entity\Objet;
use App\Entity\Pays;
use App\Entity\Religion;
use App\Entity\Utilisateur;
use App\Entity\Ville;
use App\Entity\Classe;
use App\Entity\Race;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FichePersonnageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
           ->add('age')
            ->add('taille')
            ->add('poids')
            ->add('yeux')
            ->add('cheveux')
            ->add('constitution')
            ->add('force')
            ->add('perception')
            ->add('intelligence')
            ->add('charisme')
            ->add('fuite')
            ->add('dexterite')
            ->add('classe', EntityType::class, [
                'class' => Classe::class,
                'choice_label' => 'nom_classe'
            ])

            ->add('Ville', EntityType::class, [
                'class' => Ville::class,
                'choice_label' => 'nom_ville',
            ])

            ->add('religion',  EntityType::class, [
                'class' => Religion::class,
                'choice_label' => 'nom_religion',
            ])
            ->add('race', EntityType::class,[
                'class' => Race::class,
                'choice_label' => 'nom_race',
            ])
            ->add('utilisateur', EntityType::class,[
                'class' => Utilisateur::class,
                'choice_label' => 'pseudo',
            ])
            ->add('pays', EntityType::class, [
                'class' => Pays::class,
                'choice_label' => 'nom_pays',
            ])
            ->add('Valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FichePersonnage::class,
        ]);
    }
}
