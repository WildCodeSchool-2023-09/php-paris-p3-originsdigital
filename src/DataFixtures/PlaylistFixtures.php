<?php

namespace App\DataFixtures;

use App\Entity\Playlist;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PlaylistFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $objectManager): void
    {
        // PLAYLIST JS
        $playlistJSBeginner = new Playlist();

        $playlistJSBeginner->setLabel('JS Beginner');
        $playlistJSBeginner->addVideo($this->getReference('COURS COMPLET HTML ET CSS - Eléments, balises et attributs'))
                           ->addVideo($this->getReference('HTML/CSS - images'))
                           ->addVideo($this->getReference('HTML/CSS - media queries'))
                           ->addVideo($this->getReference('Apprendre le JavaScript : Introduction à la formation'))
                           ->addVideo($this->getReference('Apprendre le JavaScript : Les variables'))
                           ->addVideo($this->getReference('Apprendre le JavaScript : Les conditions'))
                           ->addVideo($this->getReference('Apprendre le JavaScript : La portée des variables'))
                           ->addVideo($this->getReference('Apprendre le JavaScript : Les boucles'))
                           ->addVideo($this->getReference('Apprendre le JavaScript : Les fonctions'));

        $objectManager->persist($playlistJSBeginner);

        // PLAYLIST PHP
        $playlistPHPExpert = new Playlist();

        $playlistPHPExpert->setLabel('PHP Expert');
        $playlistPHPExpert->addVideo($this->getReference('Apprendre #Symfony 6 - Installation et configuration'))
                          ->addVideo($this->getReference('Apprendre #Symfony 6 - Créer une extension Twig'))
                          ->addVideo($this->getReference('Apprendre #Symfony 6 - Le cache'))
                          ->addVideo($this->getReference('Apprendre #Symfony 6 - Webpack Encore'))
                          ->addVideo($this->getReference('Apprendre #Symfony 6 - Event Listeners et Event Subscribers'))
                          ->addVideo($this->getReference('Tutoriel Symfony UX Turbo'))
                          ->addVideo($this->getReference('Docker : Premier Pas & Installation'))
                          ->addVideo($this->getReference('Docker : manipuler les conteneurs'))
                          ->addVideo($this->getReference('Déployer du PHP avec Ansible (1/2) : Presentation'))
                          ->addVideo($this->getReference('Déployer du PHP avec Ansible (2/2) :
                          Déployer le code avec Ansistrano'));

        $objectManager->persist($playlistPHPExpert);

        $playlistTest = new Playlist();
        $playlistTest->setLabel('HTML-CSS');
        $playlistTest->addVideo($this->getReference('COURS COMPLET HTML ET CSS - Eléments, balises et attributs'))
                     ->addVideo($this->getReference('HTML/CSS - images'))
                     ->addVideo($this->getReference('HTML/CSS - media queries'))
                     ->addVideo($this->getReference('Apprendre le JavaScript : Introduction à la formation'))
                     ->addVideo($this->getReference('Apprendre le JavaScript : Les variables'))
                     ->addVideo($this->getReference('Apprendre le JavaScript : Les conditions'))
                     ->addVideo($this->getReference('Apprendre le JavaScript : La portée des variables'))
                     ->addVideo($this->getReference('Apprendre le JavaScript : Les boucles'))
                     ->addVideo($this->getReference('Apprendre le JavaScript : Les fonctions'));

        $objectManager->persist($playlistTest);

        $objectManager->flush();
    }

    public function getDependencies()
    {
        return [
            VideoFixtures::class,
        ];
    }
}
