<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username')
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'options' => ['label' => false],
                'first_options'  => ['attr' => ['placeholder' => 'Mot de passe']],
                'second_options' => ['attr' => ['placeholder' => 'Confirmation']],
                'invalid_message' => 'les mots de passe ne correspondent pas.',
            ])
            ->add('email')
            ->add('profilepicture', FileType::class, [
                'label' => 'Photo de profil',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '5000k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                            'image/tiff',
                            'image/webp',
                            'image/svg+xml',
                        ],
                        'mimeTypesMessage' => 'Merci d\'uploader une photo de type 
                        Jpeg, Jpg, Png, Tiff, webp ou Svg et d\'une taille inférieure à 5mo',
                    ])
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
