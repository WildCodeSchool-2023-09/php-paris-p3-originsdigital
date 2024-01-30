<?php

namespace App\Form\Trait;

use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

trait UserTrait
{
    public function addSubscriptionFields(FormBuilderInterface $builder): void
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

    public function addInscriptionFields(FormBuilderInterface $builder): void
    {
        $builder
        ->add('username', TextType::class, [
            'label' => false,
            'required' => true,
            'attr' => [
                'placeholder' => 'Pseudo', 'class' => 'form-control',
            ],
        ])
        ->add('email', EmailType::class, [
            'label' => false,
            'required' => true,
            'attr' => [
                'placeholder' => 'Email', 'class' => 'form-control',
            ],
        ])
        ->add('profilepictureFile', VichFileType::class, [
            'required'      => false,
            'allow_delete'  => true,
            'download_uri' => true,
            'label' => false,
            'attr' => [
                'class' => 'file-input-field',
                'id' => 'user_profilepictureFile_file',
            ],
        ]);
    }
}
