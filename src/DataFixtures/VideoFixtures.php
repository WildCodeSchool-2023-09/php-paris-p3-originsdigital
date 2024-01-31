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
            'title' => 'Live Coding 1',
            'thumbnail' => 'test1.jpg',
            'description' => 'live coding 1',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        'test2.mp4' => [
            'title' => 'Tutoriel 1',
            'thumbnail' => 'test1.jpg',
            'description' => 'tuto 1',
            'category' => Video::CATEGORY_TUTORIEL,
        ],
        'test3.mp4' => [
            'title' => "Apprendre #Symfony 6 - Installation et configuration",
            'thumbnail' => 'test1.jpg',
            'description' => 'Installation et configuration',
            'category' => Video::CATEGORY_LESSON,
        ],
        'test4.mp4' => [
            'title' => 'Live Coding 2',
            'thumbnail' => 'test2.jpg',
            'description' => 'live coding 2',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        'test5.mp4' => [
            'title' => 'Tutoriel 2',
            'thumbnail' => 'test2.jpg',
            'description' => 'tuto 2',
            'category' => Video::CATEGORY_TUTORIEL,
        ],
        'test6.mp4' => [
            'title' => "Apprendre #Symfony 6 - Notre première page",
            'thumbnail' => 'test2.jpg',
            'description' => "Notre première page",
            'category' => Video::CATEGORY_LESSON,
        ],
        'test7.mp4' => [
            'title' => 'Live Coding 3',
            'thumbnail' => 'test3.jpg',
            'description' => 'live coding 3',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        'test8.mp4' => [
            'title' => 'Tutoriel 3',
            'thumbnail' => 'test3.jpg',
            'description' => 'tuto 3',
            'category' => Video::CATEGORY_TUTORIEL,
        ],
        'test9.mp4' => [
            'title' => "Apprendre #Symfony 6 - Twig & Symfony",
            'thumbnail' => 'test3.jpg',
            'description' => "Twig & Symfony",
            'category' => Video::CATEGORY_LESSON,
        ],
        'test10.mp4' => [
            'title' => 'Live Coding 4',
            'thumbnail' => 'test4.jpg',
            'description' => 'live coding 4',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        'test11.mp4' => [
            'title' => 'Tutoriel 4',
            'thumbnail' => 'test4.jpg',
            'description' => 'tuto 4',
            'category' => Video::CATEGORY_TUTORIEL,
        ],
        'test12.mp4' => [
            'title' => "Apprendre #Symfony 6 - Notre première entité",
            'thumbnail' => 'test4.jpg',
            'description' => "Notre première entité",
            'category' => Video::CATEGORY_LESSON,
        ],
        'test13.mp4' => [
            'title' => 'Live Coding 5',
            'thumbnail' => 'test5.jpg',
            'description' => 'live coding 5',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        'test14.mp4' => [
            'title' => 'Turoriel 5',
            'thumbnail' => 'test5.jpg',
            'description' => 'tuto 5',
            'category' => Video::CATEGORY_TUTORIEL,
        ],
        'test15.mp4' => [
            'title' => "Apprendre #Symfony 6 - Validation des entités",
            'thumbnail' => 'test5.jpg',
            'description' => "Validation des entités",
            'category' => Video::CATEGORY_LESSON,
        ],
        'test16.mp4' => [
            'title' => 'Live Coding 6',
            'thumbnail' => 'test6.jpg',
            'description' => 'live coding 6',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        'test17.mp4' => [
            'title' => 'Tutoriel 6',
            'thumbnail' => 'test6.jpg',
            'description' => 'tuto 6',
            'category' => Video::CATEGORY_TUTORIEL,
        ],
        'test18.mp4' => [
            'title' => "Apprendre #Symfony 6 - Les Fixtures",
            'thumbnail' => 'test6.jpg',
            'description' => 'Les Fixtures',
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
            $slug = $this->slugger->slug($video->getTitle());
            $video->setSlug($slug);

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
