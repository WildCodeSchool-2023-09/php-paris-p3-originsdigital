<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $phpLesson = new Category();
        $phpLesson->setLabel('Cours');
        $phpLesson->setLanguage($this->getReference('PHPLanguage'));

        $manager->persist($phpLesson);

        $phpTutoriel = new Category();
        $phpTutoriel->setLabel('Tutoriel');
        $phpTutoriel->setLanguage($this->getReference('PHPLanguage'));

        $manager->persist($phpTutoriel);

        $phpLiveCoding = new Category();
        $phpLiveCoding->setLabel('LiveCoding');
        $phpLiveCoding->setLanguage($this->getReference('PHPLanguage'));

        $manager->persist($phpLiveCoding);

        $jsLesson = new Category();
        $jsLesson->setLabel('Cours');
        $jsLesson->setLanguage($this->getReference('JSLanguage'));

        $manager->persist($jsLesson);

        $jsTutoriel = new Category();
        $jsTutoriel->setLabel('Tutoriel');
        $jsTutoriel->setLanguage($this->getReference('JSLanguage'));

        $manager->persist($jsTutoriel);

        $jsLiveCoding = new Category();
        $jsLiveCoding->setLabel('LiveCoding');
        $jsLiveCoding->setLanguage($this->getReference('JSLanguage'));

        $manager->persist($jsLiveCoding);

        $htmlLesson = new Category();
        $htmlLesson->setLabel('Cours');
        $htmlLesson->setLanguage($this->getReference('HTMLLanguage'));

        $manager->persist($htmlLesson);

        $htmlTutoriel = new Category();
        $htmlTutoriel->setLabel('Tutoriel');
        $htmlTutoriel->setLanguage($this->getReference('HTMLLanguage'));

        $manager->persist($htmlTutoriel);

        $htmlLiveCoding = new Category();
        $htmlLiveCoding->setLabel('LiveCoding');
        $htmlLiveCoding->setLanguage($this->getReference('HTMLLanguage'));

        $manager->persist($htmlLiveCoding);

        $cssLesson = new Category();
        $cssLesson->setLabel('Cours');
        $cssLesson->setLanguage($this->getReference('CSSLanguage'));

        $manager->persist($cssLesson);

        $cssTutoriel = new Category();
        $cssTutoriel->setLabel('Tutoriel');
        $cssTutoriel->setLanguage($this->getReference('CSSLanguage'));

        $manager->persist($cssTutoriel);

        $cssLiveCoding = new Category();
        $cssLiveCoding->setLabel('LiveCoding');
        $cssLiveCoding->setLanguage($this->getReference('CSSLanguage'));

        $manager->persist($cssLiveCoding);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
          LanguageFixtures::class,
        ];
    }
}
