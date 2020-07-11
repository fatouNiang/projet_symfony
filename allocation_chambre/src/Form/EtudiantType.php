<?php

namespace App\Form;

use App\Entity\Chambre;
use App\Entity\Etudiant;
use PhpParser\Node\Stmt\Label;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EtudiantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('matricule', null, [
                'attr' => [
                    'readonly' => true
                ]
            ])
            ->add('nom')
            ->add('prenom')
            ->add('Email')
            ->add('telephone')
            ->add('dateNaiss', DateType::class,[
                'label' => 'Date',
                'widget'=> 'single_text'
                ])
            ->add('typeEtudiant', ChoiceType ::class, [
                'choices' =>[
                    'type Etudiant'=>"",
                    'boursierLoge' => "boursierLoge",
                    'boursierNonLoge' => "boursierNonLoge",
                    'Nonboursier' => "Nonboursier"
                ]
            ])
            ->add('bourse',ChoiceType:: class, [
                'choices' =>[
                    '20000'=>"20000",
                    '40000'=>"40000"
                ],
                'label' => false
                ])
            ->add('adresse',null,[
                'label' => false
                ])
            ->add('Chambre', EntityType::class, [
                'class' => Chambre::class,
                'choice_label' => 'numeroBat',
                'label'=>false
            ])
            ->add('departement', ChoiceType::class,[
                'choices'=>[
                    'sellectionnez un departement'=>"",
                    'programmation' => "programmation",
                    'geographie' => "geographie",
                    'maketing' => "maketing"
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Etudiant::class,
        ]);
    }
}
