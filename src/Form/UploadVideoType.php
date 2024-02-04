<?php

namespace App\Form;

use App\Entity\Language;
use App\Entity\Video;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Validator\Constraints\File;

class UploadVideoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'attr'          => [
                'placeholder'   => '//Titre_'
                ]])
            ->add('description', TextareaType::class, [
                'attr'          => [
                'placeholder'   => '//Description_'
                ]])
            ->add('thumbnailFile', VichFileType::class, [
                'label'          => false,
                'required'       => false,
                'allow_delete'   => false,
                'download_uri'   => true,
                'attr' => [
                    'id' => 'thumbnailPreview',
                ],
                'constraints'    => [
                    new File([
                        'maxSize'       => '5M',
                        'mimeTypes'     => [
                            'image/jpeg',
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'Veuillez télécharger une image valide ({{ types }}).',
                    ])
                ],
            ])
            ->add('videoFile', VichFileType::class, [
                'label'             => false,
                'required'          => false,
                'allow_delete'      => false,
                'download_uri'      => false,
                'attr' => [
                    'id' => 'videoPreview',
                ],
                'constraints'       => [
                    new File([
                        'maxSize'   => '1024M',
                        'mimeTypes' => [
                            'video/mp4'
                        ],
                        'mimeTypesMessage' => 'Veuillez télécharger un fichier vidéo valide ({{ types }}).',
                    ]),
                ],
            ])
            ->add('language', EntityType::class, [
                'class'             => Language::class,
                'placeholder'       => '//Langage_',
                'choice_label'      => 'label',
            ])
            ->add('category', ChoiceType::class, [
                'placeholder' => '//Catégorie_',
                'choices' => array_flip(Video::CATEGORIES),
                'label' => 'Category',
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Video::class,
        ]);
    }
}
