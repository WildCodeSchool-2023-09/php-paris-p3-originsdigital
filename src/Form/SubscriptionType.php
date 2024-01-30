<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class SubscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('lastname', TextType::class, [
            'label' => false,
            'required' => true,
            'attr' => [
                'placeholder' => 'Nom de famille', 'class' => 'form-control',
            ],
        ])
        ->add('firstname', TextType::class, [
            'label' => false,
            'required' => true,
            'attr' => [
                'placeholder' => 'Prénom', 'class' => 'form-control',
            ],
        ])
        ->add('birthdate', DateType::class, [
            'label' => 'Date de naissance',
            'required' => true,
            'years' => range(date('Y') - 80, date('Y')),
            'attr' => [
                'id' => 'user_birthdate_container',
            ],
        ])
        ->add('houseNumber', TextType::class, [
            'label' => false,
            'required' => true,
            'attr' => [
                'placeholder' => 'Numéro', 'class' => 'form-control',
            ],
        ])
        ->add('streetName', TextType::class, [
            'label' => false,
            'required' => true,
            'attr' => [
                'placeholder' => 'Nom de la voie', 'class' => 'form-control',
            ],
        ])
        ->add('city', TextType::class, [
            'label' => false,
            'required' => true,
            'attr' => [
                'placeholder' => 'Ville', 'class' => 'form-control',
            ],
        ])
        ->add('country', TextType::class, [
            'label' => false,
            'required' => true,
            'attr' => [
                'placeholder' => 'Pays', 'class' => 'form-control',
            ],
        ])
        ->add('phoneNumber', TextType::class, [
            'label' => false,
            'required' => true,
            'attr' => [
                'placeholder' => 'Téléphone', 'class' => 'form-control',
            ],
        ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
