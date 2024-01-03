<?php

namespace App\DataFixtures;

use App\Entity\Language;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class LanguageFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $php = new Language();
        $php->setLabel('PHP');
        $php->setLogo('php-logo.svg');
        $php->setDescription('Apprends les bases du langage PHP');
        $php->setSlug('php');
        $this->addReference('PHPLanguage', $php);
        $manager->persist($php);

        $javascript = new Language();
        $javascript->setLabel('JavaScript');
        $javascript->setLogo('javascript-logo.svg');
        $javascript->setDescription('Apprends les bases du langage JavaScript');
        $javascript->setSlug('js');
        $this->addReference('JSLanguage', $javascript);
        $manager->persist($javascript);

        $html = new Language();
        $html->setLabel('HTML');
        $html->setLogo('html-logo.svg');
        $html->setDescription('Lance toi dans HTML pour commencer ton site web');
        $html->setSlug('html');
        $this->addReference('HTMLLanguage', $html);
        $manager->persist($html);

        $css = new Language();
        $css->setLabel('CSS');
        $css->setLogo('css-logo.svg');
        $css->setDescription('Personnalise ta mise en page avec CSS');
        $css->setSlug('css');
        $this->addReference('CSSLanguage', $css);
        $manager->persist($css);


        $manager->flush();
    }
}
