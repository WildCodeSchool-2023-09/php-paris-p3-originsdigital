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
        $firstLesson = new Video();
        $firstLesson  ->setTitle("Apprendre #Symfony 6 - Installation et configuration")
            ->setThumbnail("/uploads/thumbnails/test1.jpg")
            ->setDescription("Installation et configuration")
            ->setVideo("/uploads/videos/test1.mp4")
            ->setCategory($this->getReference("PHPLesson"));
        $slug = $this->slugger->slug($firstLesson->getTitle());
        $firstLesson->setSlug($slug);
        $manager->persist($firstLesson);
        $secondLesson = new Video();
        $secondLesson  ->setTitle("Apprendre #Symfony 6 - Notre première page")
            ->setThumbnail("/uploads/thumbnails/test2.jpg")
            ->setDescription("Notre première page")
            ->setVideo("/uploads/videos/test2.mp4")
            ->setCategory($this->getReference("PHPLesson"));
        $slug = $this->slugger->slug($secondLesson->getTitle());
        $secondLesson->setSlug($slug);
        $manager->persist($secondLesson);
        $thirdLesson = new Video();
        $thirdLesson  ->setTitle("Apprendre #Symfony 6 - Twig & Symfony")
            ->setThumbnail("/uploads/thumbnails/test3.jpg")
            ->setDescription("Twig & Symfony")
            ->setVideo("/uploads/videos/test3.mp4")
            ->setCategory($this->getReference("PHPLesson"));
        $slug = $this->slugger->slug($thirdLesson->getTitle());
        $thirdLesson->setSlug($slug);
        $manager->persist($thirdLesson);
        $fourthLesson = new Video();
        $fourthLesson  ->setTitle("Apprendre #Symfony 6 - Notre première entité")
            ->setThumbnail("/uploads/thumbnails/test4.jpg")
            ->setDescription("Notre première entité")
            ->setVideo("/uploads/videos/test4.mp4")
            ->setCategory($this->getReference("PHPLesson"));
        $slug = $this->slugger->slug($fourthLesson->getTitle());
        $fourthLesson->setSlug($slug);
        $manager->persist($fourthLesson);
        $fifthLesson = new Video();
        $fifthLesson  ->setTitle("Apprendre #Symfony 6 - Validation des entités")
            ->setThumbnail("/uploads/thumbnails/test5.jpg")
            ->setDescription("Validation des entités")
            ->setVideo("/uploads/videos/test5.mp4")
            ->setCategory($this->getReference("PHPLesson"));
        $slug = $this->slugger->slug($fifthLesson->getTitle());
        $fifthLesson->setSlug($slug);
        $manager->persist($fifthLesson);
        $sixthLesson = new Video();
        $sixthLesson  ->setTitle("Apprendre #Symfony 6 - Les Fixtures")
            ->setThumbnail("/uploads/thumbnails/test6.jpg")
            ->setDescription(" Les Fixtures")
            ->setVideo("/uploads/videos/test6.mp4")
            ->setCategory($this->getReference("PHPLesson"));
        $slug = $this->slugger->slug($sixthLesson->getTitle());
        $sixthLesson->setSlug($slug);
        $manager->persist($sixthLesson);
        $manager->flush();
    }
    public function getDependencies()
    {
        return [
        CategoryFixtures::class,
        ];
    }
}
