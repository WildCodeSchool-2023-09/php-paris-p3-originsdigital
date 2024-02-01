<?php

namespace App\Form;

use App\Entity\User;
use App\Form\Trait\UserTrait;
use Symfony\Component\Form\AbstractType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class UserType extends AbstractType
{
    use UserTrait;

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $this->addInscriptionFields($builder);
        $builder
        ->add('profilepictureFile', VichFileType::class, [
            'required'      => false,
            'allow_delete'  => false,
            'download_uri' => false,
            'label' => false,
            'attr' => [
                'class' => 'file-input-field',
                'id' => 'user_profilepictureFile_file',
            ],
        ])
        ->add('password', RepeatedType::class, [
            'type' => PasswordType::class,
            'options' => ['label' => false],
            'first_options'  => ['attr' => ['placeholder' => 'Mot de passe']],
            'second_options' => ['attr' => ['placeholder' => 'Confirmation']],
            'invalid_message' => 'les mots de passe ne correspondent pas.',
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
