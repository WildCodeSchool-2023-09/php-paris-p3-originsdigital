<?php

namespace App\DataFixtures;

use App\Entity\Video;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class VideoFixtures extends Fixture implements DependentFixtureInterface
{
    private SluggerInterface $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public function load(ObjectManager $manager): void
    {
        $videoData = [
                    'title' => [
                                            'Live Coding 1',
                                            'Live Coding 2',
                                            'Live Coding 3',
                                            'Live Coding 4',
                                            'Tutoriel 1',
                                            'Tutoriel 2',
                                            'Tutoriel 3',
                                            'Tutoriel 4',
                                            "Apprendre #Symfony 6 - Installation et configuration",
                                            "Apprendre #Symfony 6 - Notre première page",
                                            "Apprendre #Symfony 6 - Twig & Symfony",
                                            "Apprendre #Symfony 6 - Notre première entité",
                                            "Apprendre #Symfony 6 - Validation des entités",
                                            "Apprendre #Symfony 6 - Les Fixtures",],
                    'thumbnail' => [
                                            '/uploads/thumbnails/test1.jpg',
                                            '/uploads/thumbnails/test2.jpg',
                                            '/uploads/thumbnails/test3.jpg',
                                            '/uploads/thumbnails/test4.jpg',
                                            '/uploads/thumbnails/test1.jpg',
                                            '/uploads/thumbnails/test2.jpg',
                                            '/uploads/thumbnails/test3.jpg',
                                            '/uploads/thumbnails/test4.jpg',
                                            '/uploads/thumbnails/test1.jpg',
                                            '/uploads/thumbnails/test2.jpg',
                                            '/uploads/thumbnails/test3.jpg',
                                            '/uploads/thumbnails/test4.jpg',
                                            '/uploads/thumbnails/test5.jpg',
                                            '/uploads/thumbnails/test6.jpg',],
                    'description' => [
                                            'live coding 1',
                                            'live coding 2',
                                            'live coding 3',
                                            'live coding 4',
                                            'tuto 1',
                                            'tuto 2',
                                            'tuto 3',
                                            'tuto 4',
                                            'Installation et configuration',
                                            'Notre première page',
                                            'Twig & Symfony',
                                            'Notre première entité',
                                            'Validation des entités',
                                            'Les Fixtures',],
                    'video' => [
                                            '/uploads/videos/test1.mp4',
                                            '/uploads/videos/test2.mp4',
                                            '/uploads/videos/test3.mp4',
                                            '/uploads/videos/test4.mp4',
                                            '/uploads/videos/test1.mp4',
                                            '/uploads/videos/test2.mp4',
                                            '/uploads/videos/test3.mp4',
                                            '/uploads/videos/test4.mp4',
                                            '/uploads/videos/test1.mp4',
                                            '/uploads/videos/test2.mp4',
                                            '/uploads/videos/test3.mp4',
                                            '/uploads/videos/test4.mp4',
                                            '/uploads/videos/test5.mp4',
                                            '/uploads/videos/test6.mp4',],
                    'categoryReference' => [
                                            'PHPLiveCoding', 'PHPLiveCoding', 'PHPLiveCoding', 'PHPLiveCoding',
                                            'PHPTutoriel','PHPTutoriel','PHPTutoriel','PHPTutoriel',
                                            'PHPLesson','PHPLesson','PHPLesson','PHPLesson','PHPLesson','PHPLesson',],
                ];
        $count = 0;
        foreach ($videoData['title'] as $title) {
            $video = new Video();
            $video->setTitle($title);
            $video->setThumbnail($videoData['thumbnail'][$count]);
            $video->setDescription($videoData['description'][$count]);
            $video->setVideo($videoData['video'][$count]);
            $video->setCategory($this->getReference($videoData['categoryReference'][$count]));
            $count = $count + 1;
            $slug = $this->slugger->slug($video->getTitle());
            $video->setSlug($slug);

            $manager->persist($video);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
