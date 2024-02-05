<?php

namespace App\DataFixtures;

use App\Config\Category;
use App\Entity\Video;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class VideoFixtures extends Fixture implements DependentFixtureInterface
{
    public const VIDEO_DATA = [
        'test1.mp4' => [
            'title' => 'COURS COMPLET HTML ET CSS - Eléments, balises et attributs',
            'thumbnail' => 'test1.jpg',
            'description' => 'Introduction à la programmation avec HTML/CSS',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        'test2.mp4' => [
            'title' => 'HTML/CSS - images',
            'thumbnail' => 'test1.jpg',
            'description' => 'Rajoutez des images sur votre site',
            'category' => Video::CATEGORY_TUTORIEL,
        ],
        'test3.mp4' => [
            'title' => "HTML/CSS - media queries",
            'thumbnail' => 'test1.jpg',
            'description' => 'Un beau site est beau sur tous les formats',
            'category' => Video::CATEGORY_LESSON,
        ],
        'test4.mp4' => [
            'title' => 'Apprendre le JavaScript : Introduction à la formation',
            'thumbnail' => 'test2.jpg',
            'description' => "Qu'est ce que le JS ? Pourquoi l'utiliser ?",
            'category' => Video::CATEGORY_LIVECODING,
        ],
        'test5.mp4' => [
            'title' => 'Apprendre le JavaScript : Les variables',
            'thumbnail' => 'test2.jpg',
            'description' => 'Apprennez les variables et leur principe en JS',
            'category' => Video::CATEGORY_TUTORIEL,
        ],
        'test6.mp4' => [
            'title' => "Apprendre le JavaScript : Les conditions",
            'thumbnail' => 'test2.jpg',
            'description' => "if you don't know you will know ",
            'category' => Video::CATEGORY_LESSON,
        ],
        'test7.mp4' => [
            'title' => 'Apprendre le JavaScript : La portée des variables',
            'thumbnail' => 'test3.jpg',
            'description' => 'Tout est fait pour les maitriser',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        'test8.mp4' => [
            'title' => 'Apprendre le JavaScript : Les boucles',
            'thumbnail' => 'test3.jpg',
            'description' => 'Apprennez les boucles svp',
            'category' => Video::CATEGORY_TUTORIEL,
        ],
        'test9.mp4' => [
            'title' => "Apprendre le JavaScript : Les fonctions",
            'thumbnail' => 'test3.jpg',
            'description' => "Ultra important, on en fait TROP",
            'category' => Video::CATEGORY_LESSON,
        ],
        'test10.mp4' => [
            'title' => 'Apprendre #Symfony 6 - Installation et configuration',
            'thumbnail' => 'test4.jpg',
            'description' => 'Installation et configuration',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        'test11.mp4' => [
            'title' => 'Apprendre #Symfony 6 - Créer une extension Twig',
            'thumbnail' => 'test4.jpg',
            'description' => 'Créer une extension Twig',
            'category' => Video::CATEGORY_TUTORIEL,
        ],
        'test12.mp4' => [
            'title' => "Apprendre #Symfony 6 - Le cache",
            'thumbnail' => 'test4.jpg',
            'description' => "Les trucs & astuces du cache",
            'category' => Video::CATEGORY_LESSON,
        ],
        'test13.mp4' => [
            'title' => 'Apprendre #Symfony 6 - Webpack Encore',
            'thumbnail' => 'test5.jpg',
            'description' => 'Webpack Encore',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        'test14.mp4' => [
            'title' => 'Apprendre #Symfony 6 - Event Listeners et Event Subscribers',
            'thumbnail' => 'test5.jpg',
            'description' => 'Event Listeners et Event Subscribers',
            'category' => Video::CATEGORY_TUTORIEL,
        ],
        'test15.mp4' => [
            'title' => "Tutoriel Symfony UX Turbo",
            'thumbnail' => 'test5.jpg',
            'description' => "Tutoriel Symfony UX Turbo",
            'category' => Video::CATEGORY_LESSON,
        ],
        'test16.mp4' => [
            'title' => 'Docker : Premier Pas & Installation',
            'thumbnail' => 'test6.jpg',
            'description' => 'Découvrez Docker',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        'test17.mp4' => [
            'title' => 'Docker : manipuler les conteneurs',
            'thumbnail' => 'test6.jpg',
            'description' => 'Apprennez à utiliser Docker',
            'category' => Video::CATEGORY_TUTORIEL,
        ],
        'test18.mp4' => [
            'title' => "Déployer du PHP avec Ansible (1/2) : Presentation",
            'thumbnail' => 'test6.jpg',
            'description' => 'Découvrez Ansible et déployez votre projet',
            'category' => Video::CATEGORY_LESSON,
        ],
        'test19.mp4' => [
            'title' => "Déployer du PHP avec Ansible (2/2) : Déployer le code avec Ansistrano",
            'thumbnail' => 'test6.jpg',
            'description' => 'Configurez le déploiement en CI de votre projet avec Ansible',
            'category' => Video::CATEGORY_LESSON,
        ],
    ];

    private SluggerInterface $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public function load(ObjectManager $manager): void
    {
        foreach (self::VIDEO_DATA as $key => $properties) {
            $video = new Video();
            $video->setVideo($key);
            $video->setTitle($properties['title']);
            $video->setThumbnail($properties['thumbnail']);
            $video->setDescription($properties['description']);
            $video->setCategory($properties['category']);
            $video->setLanguage($this->getReference('PHPLanguage'));
            $video->setSlug($this->slugger->slug($video->getTitle()));

            $this->setReference($video->getTitle(), $video);

            $manager->persist($video);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            LanguageFixtures::class,
        ];
    }
}
