<?php

namespace App\DataFixtures;

use App\Entity\Video;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $category = new Video();
        $category->setTitle('PHP Cours 1 : Les variables');
        $manager->persist($category);
        $manager->flush();
    }
}