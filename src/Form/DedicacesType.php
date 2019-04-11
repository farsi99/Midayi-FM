<?php

namespace App\Form;

use App\Entity\Dedicaces;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class DedicacesType extends AbstractType
{
    const CIV = [
        '' => 'Civilité',
        'Madame' => 'Madame',
        'Monsieur' => 'Monsieur'
    ];

    const TYPCHAN = ['Toirabe' => 'Toirabe', 'Zouk' => 'Zouk', 'RAP' => 'RAP', 'Française' => 'Française', 'Word music' => 'Word music'];

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'civilite',
                ChoiceType::class,
                ['choices' => $this->gettypes(self::CIV)]
            )
            ->add('nom')
            ->add('prenom')
            ->add('adresse')
            ->add('codePostal')
            ->add('ville')
            ->add('email', EmailType::class)
            ->add('telephone')
            ->add('chanson')
            ->add('typeChanson', ChoiceType::class, [
                'choices' => $this->gettypes(self::TYPCHAN)
            ])
            ->add('artisite')
            ->add('destinataire');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Dedicaces::class,
        ]);
    }

    private function gettypes($param)
    {
        $output = [];
        foreach ($param as $key => $v) {
            $output[$v] = $key;
        }
        return $output;
    }
}
