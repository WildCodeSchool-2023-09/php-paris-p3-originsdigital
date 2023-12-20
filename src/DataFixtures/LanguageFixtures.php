<?php

namespace App\DataFixtures;

use App\Entity\Language;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LanguageFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $php = new Language();
        $php->setLabel('PHP');
        $php->setLogo('php-logo.svg');
        $php->setDescription('Apprends les bases du langage PHP');
        $this->addReference($php . 'Language', $php);
        $manager->persist($php);

        $js = new Language();
        $js->setLabel('JavaScript');
        $js->setLogo('js-logo.svg');
        $js->setDescription('Apprends les bases du langage JavaScript');
        $this->addReference($js . 'Language', $js);
        $manager->persist($js);

        $html = new Language();
        $html->setLabel('HTML');
        $html->setLogo('html-logo.svg');
        $html->setDescription('Lance toi dans HTML pour commencer ton site web');
        $this->addReference($html . 'Language', $html);
        $manager->persist($html);

        $css = new Language();
        $css->setLabel('CSS');
        $css->setLogo('css-logo.svg');
        $css->setDescription('Personnalise ta mise en page avec CSS');
        $this->addReference($css . 'Language', $css);
        $manager->persist($css);


        $manager->flush();
    }
}
