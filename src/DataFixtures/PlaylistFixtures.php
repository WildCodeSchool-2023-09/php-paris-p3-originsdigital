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
        $playlistJSBeginner = new Playlist();
        $playlistJSBeginner->setLabel('JS Beginner');
        $playlistJSBeginner->addVideo($this->getReference('HTMLLanguage - Introduction'))
                           ->addVideo($this->getReference('HTMLLanguage - Première page web'))
                           ->addVideo($this->getReference('HTMLLanguage - Les balises'))
                           ->addVideo($this->getReference('HTMLLanguage - Le formatage (1/2)'))
                           ->addVideo($this->getReference('HTMLLanguage - Le formatage (2/2)'))
                           ->addVideo($this->getReference('HTMLLanguage - Les listes'))
                           ->addVideo($this->getReference('HTMLLanguage - Les tableaux'))
                           ->addVideo($this->getReference('HTMLLanguage - Les images'))
                           ->addVideo($this->getReference('CSSLanguage - Les sélecteurs'))
                           ->addVideo($this->getReference('CSSLanguage - Le modèle de boîte'))
                           ->addVideo($this->getReference('CSSLanguage - Les polices'))
                           ->addVideo($this->getReference('CSSLanguage - Les formats de couleurs'))
                           ->addVideo($this->getReference('CSSLanguage - Les unités de mesure'))
                           ->addVideo($this->getReference('CSSLanguage - Le positionnement'))
                           ->addVideo($this->getReference('CSSLanguage - Les éléments flottants'))
                           ->addVideo($this->getReference('CSSLanguage - La propriété background'))
                           ->addVideo($this->getReference('CSSLanguage - Transform'))
                           ->addVideo($this->getReference('CSSLanguage - Animation'))
                           ->addVideo($this->getReference('CSSLanguage - Responsive et media query'))
                           ->addVideo($this->getReference('JSLanguage - Les variables'))
                           ->addVideo($this->getReference('JSLanguage - Les conditions'))
                           ->addVideo($this->getReference('JSLanguage - Les boucles'))
                           ->addVideo($this->getReference('JSLanguage - Les fonctions'))
                           ->addVideo($this->getReference('JSLanguage - Les classes'))
                           ->addVideo($this->getReference('JSLanguage - Les erreurs'))
                           ->addVideo($this->getReference('JSLanguage - Les promises'))
                           ->addVideo($this->getReference('JSLanguage - La méthode fetch'))
                           ->addVideo($this->getReference('JSLanguage - Les modules'))
                           ->addVideo($this->getReference('JSLanguage - L\'objet Date'))
                           ->addVideo($this->getReference('JSLanguage - Les écouteurs d\'événements'));
            
        $objectManager->persist($playlistJSBeginner);

        $playlistPHPExpert = new Playlist();
        $playlistPHPExpert->setLabel('PHP Expert');
        $playlistPHPExpert->addVideo($this->getReference('PHPLanguage - L\'installation'))
                          ->addVideo($this->getReference('PHPLanguage - Les variables'))
                          ->addVideo($this->getReference('PHPLanguage - Les tableaux'))
                          ->addVideo($this->getReference('PHPLanguage - Les conditions'))
                          ->addVideo($this->getReference('PHPLanguage - Les boucles'))
                          ->addVideo($this->getReference('PHPLanguage - Les fonctions'))
                          ->addVideo($this->getReference('PHPLanguage - Require & Include'))
                          ->addVideo($this->getReference('PHPLanguage - Les formulaires'))
                          ->addVideo($this->getReference('PHPLanguage - Les dates'))
                          ->addVideo($this->getReference('PHPLanguage - Les sessions'))
                          ->addVideo($this->getReference('PHPLanguage - Les classes'))
                          ->addVideo($this->getReference('PHPLanguage - Le mot-clé static'))
                          ->addVideo($this->getReference('PHPLanguage - L\'héritage'))
                          ->addVideo($this->getReference('PHPLanguage - Les exceptions'))
                          ->addVideo($this->getReference('PHPLanguage - La PDO'))
                          ->addVideo($this->getReference('PHPLanguage - Les namespaces'))
                          ->addVideo($this->getReference('PHPLanguage - L\'autoloader'))
                          ->addVideo($this->getReference('PHPLanguage - Composer'))
                          ->addVideo($this->getReference('PHPLanguage - Le Query Builder'))
                          ->addVideo($this->getReference('PHPLanguage - La pagination'));

        $objectManager->persist($playlistPHPExpert);

        $playlistDefault = new Playlist();
        $playlistDefault->setLabel('HTML & CSS');
        $playlistDefault->addVideo($this->getReference('HTMLLanguage - Introduction'))
                        ->addVideo($this->getReference('HTMLLanguage - Première page web'))
                        ->addVideo($this->getReference('HTMLLanguage - Les balises'))
                        ->addVideo($this->getReference('HTMLLanguage - Le formatage (1/2)'))
                        ->addVideo($this->getReference('HTMLLanguage - Le formatage (2/2)'))
                        ->addVideo($this->getReference('HTMLLanguage - Les listes'))
                        ->addVideo($this->getReference('HTMLLanguage - Les tableaux'))
                        ->addVideo($this->getReference('HTMLLanguage - Les images'))
                        ->addVideo($this->getReference('CSSLanguage - Les sélecteurs'))
                        ->addVideo($this->getReference('CSSLanguage - Le modèle de boîte'))
                        ->addVideo($this->getReference('CSSLanguage - Les polices'))
                        ->addVideo($this->getReference('CSSLanguage - Les formats de couleurs'))
                        ->addVideo($this->getReference('CSSLanguage - Les unités de mesure'))
                        ->addVideo($this->getReference('CSSLanguage - Le positionnement'))
                        ->addVideo($this->getReference('CSSLanguage - Les éléments flottants'))
                        ->addVideo($this->getReference('CSSLanguage - La propriété background'))
                        ->addVideo($this->getReference('CSSLanguage - Transform'))
                        ->addVideo($this->getReference('CSSLanguage - Animation'))
                        ->addVideo($this->getReference('CSSLanguage - Responsive et media query'));

        $objectManager->persist($playlistDefault);

        $objectManager->flush();
    }

    public function getDependencies()
    {
        return [
            VideoFixtures::class,
        ];
    }
}
