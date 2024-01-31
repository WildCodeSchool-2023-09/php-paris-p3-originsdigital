<?php

namespace App\Form;

use App\Entity\User;
use App\Form\Trait\UserTrait;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserEditType extends AbstractType
{
    use UserTrait;

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $this->addInscriptionFields($builder);
        $this->addSubscriptionFields($builder);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
