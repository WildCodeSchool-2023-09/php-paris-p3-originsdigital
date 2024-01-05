<?php

namespace App\DataFixtures;

use App\Entity\Video;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class VideoFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $firstLesson = new Video();
        $firstLesson  ->setTitle("Apprendre #Symfony 6 - Installation et configuration")
            ->setThumbnail("https://www.dzfoot.com/wp-content/uploads/2022/07/
        AG-%C2%AClective-de-la-FAF-16-750x430-600x390.jpg")
            ->setDescription("Installation et configuration")
            ->setVideo("https://youtu.be/WJZgqmA4hi0?si=5TiR45py1rkXkTTe")
            ->setCategory($this->getReference("PHPLesson"));
        $manager->persist($firstLesson);
        $secondLesson = new Video();
        $secondLesson  ->setTitle("Apprendre #Symfony 6 - Notre première page")
            ->setThumbnail("https://cdn.lebuteur.com/data/images/article/thumbs/
        large-zefzef-a-fait-une-viree-au-stade-hier-a6ab8.jpg")
            ->setDescription("Notre première page")
            ->setVideo("https://youtu.be/_lrnWIuknSU?si=0OoPGrKTBFhwLcDl")
            ->setCategory($this->getReference("PHPLesson"));
        $manager->persist($secondLesson);
        $thirdLesson = new Video();
        $thirdLesson  ->setTitle("Apprendre #Symfony 6 - Twig & Symfony")
            ->setThumbnail("https://pbs.twimg.com/media/FXEBikKXwAYCeNq.jpg")
            ->setDescription("Twig & Symfony")
            ->setVideo("https://youtu.be/nxjflBN47zA?si=j_lBDVZXczo_hF8J")
            ->setCategory($this->getReference("PHPLesson"));
        $manager->persist($thirdLesson);
        $fourthLesson = new Video();
        $fourthLesson  ->setTitle("Apprendre #Symfony 6 - Notre première entité")
            ->setThumbnail("https://pbs.twimg.com/media/FXEV4jrUYAA1Qhs.jpg")
            ->setDescription("Notre première entité")
            ->setVideo("https://youtu.be/PWkLFn8if0I?si=4B445er-8Y-_nUSC")
            ->setCategory($this->getReference("PHPLesson"));
        $manager->persist($fourthLesson);
        $fifthLesson = new Video();
        $fifthLesson  ->setTitle("Apprendre #Symfony 6 - Validation des entités")
            ->setThumbnail("https://encrypted-tbn0.gstatic.com/
        images?q=tbn:ANd9GcSQ3qza-vLatZLZ1J6jGHmxLNTqjbQeTcuNKw&usqp=CAU")
            ->setDescription("Validation des entités")
            ->setVideo("https://youtu.be/e9Q4zP2wB5o?si=uB7E4B6iTGK30yH-")
            ->setCategory($this->getReference("PHPLesson"));
        $manager->persist($fifthLesson);
        $sixthLesson = new Video();
        $sixthLesson  ->setTitle("Apprendre #Symfony 6 -  Les Fixtures")
            ->setThumbnail("https://elwatan-dz.com/storage/2120/276265792.jpg")
            ->setDescription(" Les Fixtures")
            ->setVideo("https://youtu.be/hv_SWZUb1Us?si=4eoPj7xJ9kkr0RGJ")
            ->setCategory($this->getReference("PHPLesson"));
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
