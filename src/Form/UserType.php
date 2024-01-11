<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Vich\UploaderBundle\Form\Type\VichFileType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', TextType::class, [
                'label' => false,
                'required' => true,
                'attr' => [
                    'placeholder' => 'Pseudo', 'class' => 'form-control',
                ],
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'options' => ['label' => false],
                'first_options'  => ['attr' => ['placeholder' => 'Mot de passe']],
                'second_options' => ['attr' => ['placeholder' => 'Confirmation']],
                'invalid_message' => 'les mots de passe ne correspondent pas.',
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
            ])
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
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
