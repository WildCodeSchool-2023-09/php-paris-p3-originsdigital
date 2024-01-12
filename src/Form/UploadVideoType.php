<?php

namespace App\Form;

use App\Entity\Language;
use App\Entity\Video;
use App\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
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
                'label'          => 'Image (.jpg ou .png)',
                'required'       => false,
                'allow_delete'   => true,
                'download_uri'   => true,
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
                'label'             => 'Video (.mp4)',
                'required'          => false,
                'allow_delete'      => true,
                'download_uri'      => true,
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
                'mapped'            => false,
                'class'             => Language::class,
                'placeholder'       => '//Langage_',
                'choice_label'      => 'label'
            ])
            ->add('category', EntityType::class, [
                'class'         => Category::class,
                'placeholder'   => '//Categorie_',
                'choice_label'  => 'label',
                'choice_attr'   => function (?Category $category) {
                    return ['data-category-id' => $category->getLanguage()->getId()];
                }
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Video::class,
        ]);
    }
}
