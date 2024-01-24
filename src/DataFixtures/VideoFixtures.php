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
        '/uploads/videos/test1.mp4' => [
            'title' => 'Live Coding 1',
            'thumbnail' => '/uploads/thumbnails/test1.jpg',
            'description' => 'live coding 1',
            'category' => Video::CATEGORIES['LiveCoding'],
        ],
        '/uploads/videos/test2.mp4' => [
            'title' => 'Tutoriel 1',
            'thumbnail' => '/uploads/thumbnails/test1.jpg',
            'description' => 'tuto 1',
            'category' => Video::CATEGORIES['Tutoriel'],
        ],
        '/uploads/videos/test3.mp4' => [
            'title' => "Apprendre #Symfony 6 - Installation et configuration",
            'thumbnail' => '/uploads/thumbnails/test1.jpg',
            'description' => 'Installation et configuration',
            'category' => Video::CATEGORIES['Cours'],
        ],
        '/uploads/videos/test4.mp4' => [
            'title' => 'Live Coding 2',
            'thumbnail' => '/uploads/thumbnails/test2.jpg',
            'description' => 'live coding 2',
            'category' => Video::CATEGORIES['LiveCoding'],
        ],
        '/uploads/videos/test5.mp4' => [
            'title' => 'Tutoriel 2',
            'thumbnail' => '/uploads/thumbnails/test2.jpg',
            'description' => 'tuto 2',
            'category' => Video::CATEGORIES['Tutoriel'],
        ],
        '/uploads/videos/test6.mp4' => [
            'title' => "Apprendre #Symfony 6 - Notre première page",
            'thumbnail' => '/uploads/thumbnails/test2.jpg',
            'description' => "Notre première page",
            'category' => Video::CATEGORIES['Cours'],
        ],
        '/uploads/videos/test7.mp4' => [
            'title' => 'Live Coding 3',
            'thumbnail' => '/uploads/thumbnails/test3.jpg',
            'description' => 'live coding 3',
            'category' => Video::CATEGORIES['LiveCoding'],
        ],
        '/uploads/videos/test8.mp4' => [
            'title' => 'Tutoriel 3',
            'thumbnail' => '/uploads/thumbnails/test3.jpg',
            'description' => 'tuto 3',
            'category' => Video::CATEGORIES['Tutoriel'],
        ],
        '/uploads/videos/test9.mp4' => [
            'title' => "Apprendre #Symfony 6 - Twig & Symfony",
            'thumbnail' => '/uploads/thumbnails/test3.jpg',
            'description' => "Twig & Symfony",
            'category' => Video::CATEGORIES['Cours'],
        ],
        '/uploads/videos/test10.mp4' => [
            'title' => 'Live Coding 4',
            'thumbnail' => '/uploads/thumbnails/test4.jpg',
            'description' => 'live coding 4',
            'category' => Video::CATEGORIES['LiveCoding'],
        ],
        '/uploads/videos/test11.mp4' => [
            'title' => 'Tutoriel 4',
            'thumbnail' => '/uploads/thumbnails/test4.jpg',
            'description' => 'tuto 4',
            'category' => Video::CATEGORIES['Tutoriel'],
        ],
        '/uploads/videos/test12.mp4' => [
            'title' => "Apprendre #Symfony 6 - Notre première entité",
            'thumbnail' => '/uploads/thumbnails/test4.jpg',
            'description' => "Notre première entité",
            'category' => Video::CATEGORIES['Cours'],
        ],
        '/uploads/videos/test13.mp4' => [
            'title' => 'Live Coding 5',
            'thumbnail' => '/uploads/thumbnails/test5.jpg',
            'description' => 'live coding 5',
            'category' => Video::CATEGORIES['LiveCoding'],
        ],
        '/uploads/videos/test14.mp4' => [
            'title' => 'Turoriel 5',
            'thumbnail' => '/uploads/thumbnails/test5.jpg',
            'description' => 'tuto 5',
            'category' => Video::CATEGORIES['Tutoriel'],
        ],
        '/uploads/videos/test15.mp4' => [
            'title' => "Apprendre #Symfony 6 - Validation des entités",
            'thumbnail' => '/uploads/thumbnails/test5.jpg',
            'description' => "Validation des entités",
            'category' => Video::CATEGORIES['Cours'],
        ],
        '/uploads/videos/test16.mp4' => [
            'title' => 'Live Coding 6',
            'thumbnail' => '/uploads/thumbnails/test6.jpg',
            'description' => 'live coding 6',
            'category' => Video::CATEGORIES['LiveCoding'],
        ],
        '/uploads/videos/test17.mp4' => [
            'title' => 'Tutoriel 6',
            'thumbnail' => '/uploads/thumbnails/test6.jpg',
            'description' => 'tuto 6',
            'category' => Video::CATEGORIES['Tutoriel'],
        ],
        '/uploads/videos/test18.mp4' => [
            'title' => "Apprendre #Symfony 6 - Les Fixtures",
            'thumbnail' => '/uploads/thumbnails/test6.jpg',
            'description' => 'Les Fixtures',
            'category' => Video::CATEGORIES['Cours'],
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
