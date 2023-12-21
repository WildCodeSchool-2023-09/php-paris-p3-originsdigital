<?php

namespace App\DataFixtures;

use App\Entity\Video;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
;

class VideoFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $video = new Video();

        // TODO : Remplir les données d'une vidéo (TOUT)
        // Pense à utiliser Faker

        $manager->persist($video);
        $manager->flush();
    }
}
