<?php

namespace App\Form;

use App\Entity\Actualite;
use App\Entity\Categorie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use App\Entity\TypeActualite;

class ActualiteType extends AbstractType
{
    const FORMAT = ['Normale' => 'default', 'Vidéo' => 'video'];

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('lead')
            ->add('contenu')
            ->add('image')
            ->add('createdAt')
            ->add('auteur')
            ->add('ordreAffichage')
            ->add('etatPub')
            ->add('slug')
            ->add(
                'categorie',
                EntityType::class,
                [
                    'class' => Categorie::class,
                    'choice_label' => 'libelle'
                ]
            )
            ->add(
                'typeActualite',
                EntityType::class,
                [
                    'class' => TypeActualite::class,
                    'choice_label' => 'station'
                ]
            )
            ->add(
                'formatActu',
                ChoiceType::class,
                ['choices' => ['Normale' => 'default', 'Vidéo' => 'video']]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Actualite::class,
        ]);
    }
}
