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
        $this->addReference('PHPLesson', $phpLesson);

        $manager->persist($phpLesson);

        $phpTutoriel = new Category();
        $phpTutoriel->setLabel('Tutoriel');
        $phpTutoriel->setLanguage($this->getReference('PHPLanguage'));
        $this->addReference('PHPTutoriel', $phpTutoriel);

        $manager->persist($phpTutoriel);

        $phpLiveCoding = new Category();
        $phpLiveCoding->setLabel('LiveCoding');
        $phpLiveCoding->setLanguage($this->getReference('PHPLanguage'));
        $this->addReference('PHPLiveCoding', $phpLiveCoding);

        $manager->persist($phpLiveCoding);

        $jsLesson = new Category();
        $jsLesson->setLabel('Cours');
        $jsLesson->setLanguage($this->getReference('JSLanguage'));
        $this->addReference('JSLesson', $jsLesson);

        $manager->persist($jsLesson);

        $jsTutoriel = new Category();
        $jsTutoriel->setLabel('Tutoriel');
        $jsTutoriel->setLanguage($this->getReference('JSLanguage'));
        $this->addReference('JSTutoriel', $jsTutoriel);

        $manager->persist($jsTutoriel);

        $jsLiveCoding = new Category();
        $jsLiveCoding->setLabel('LiveCoding');
        $jsLiveCoding->setLanguage($this->getReference('JSLanguage'));
        $this->addReference('JSLiveCoding', $jsLiveCoding);

        $manager->persist($jsLiveCoding);

        $htmlLesson = new Category();
        $htmlLesson->setLabel('Cours');
        $htmlLesson->setLanguage($this->getReference('HTMLLanguage'));
        $this->addReference('HTMLLesson', $htmlLesson);

        $manager->persist($htmlLesson);

        $htmlTutoriel = new Category();
        $htmlTutoriel->setLabel('Tutoriel');
        $htmlTutoriel->setLanguage($this->getReference('HTMLLanguage'));
        $this->addReference('HTMLTutoriel', $htmlTutoriel);

        $manager->persist($htmlTutoriel);

        $htmlLiveCoding = new Category();
        $htmlLiveCoding->setLabel('LiveCoding');
        $htmlLiveCoding->setLanguage($this->getReference('HTMLLanguage'));
        $this->addReference('HTMLLiveCoding', $htmlLiveCoding);

        $manager->persist($htmlLiveCoding);

        $cssLesson = new Category();
        $cssLesson->setLabel('Cours');
        $cssLesson->setLanguage($this->getReference('CSSLanguage'));
        $this->addReference('CSSLesson', $cssLesson);

        $manager->persist($cssLesson);

        $cssTutoriel = new Category();
        $cssTutoriel->setLabel('Tutoriel');
        $cssTutoriel->setLanguage($this->getReference('CSSLanguage'));
        $this->addReference('CSSTutoriel', $cssTutoriel);

        $manager->persist($cssTutoriel);

        $cssLiveCoding = new Category();
        $cssLiveCoding->setLabel('LiveCoding');
        $cssLiveCoding->setLanguage($this->getReference('CSSLanguage'));
        $this->addReference('CSSLiveCoding', $cssLiveCoding);

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
