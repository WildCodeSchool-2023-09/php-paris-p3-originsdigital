<?php

namespace App\DataFixtures;

use App\Config\Category;
use App\Entity\Video;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class VideoFixtures extends Fixture implements DependentFixtureInterface
{
    public const VIDEO_JS_LESSON_DATA = [
        [   'video' => 'jslesson.mp4',
            'title' => 'Les variables',
            'thumbnail' => 'variablesjs.jpg',
            'description' => 'Découvre comment créer des variables en Javascript',
            'category' => Video::CATEGORY_LESSON,
        ],
        [   'video' => 'jslesson.mp4',
            'title' => 'Les conditions',
            'thumbnail' => 'conditionsjs.jpg',
            'description' => 'Découvre comment écrire des opérateurs 
            conditionnels pour prendre des décisions dans ton code Javascript',
            'category' => Video::CATEGORY_LESSON,
        ],
        [   'video' => 'jslesson.mp4',
            'title' => 'Les boucles',
            'thumbnail' => 'bouclesjs.jpg',
            'description' => 'Découvre comment écrire des boucles pour 
            pouvoir itérer dans ton code Javascript',
            'category' => Video::CATEGORY_LESSON,
        ],
        [   'video' => 'jslesson.mp4',
            'title' => 'Les fonctions',
            'thumbnail' => 'fonctionsjs.jpg',
            'description' => 'Découvre comment écrire des fonctions 
            afin de pouvoir réutiliser du code',
            'category' => Video::CATEGORY_LESSON,
        ],
        [   'video' => 'jslesson.mp4',
            'title' => 'Les classes',
            'thumbnail' => 'classesjs.jpg',
            'description' => 'Découvre les classes en JavaScript',
            'category' => Video::CATEGORY_LESSON,
        ],
        [   'video' => 'jslesson.mp4',
            'title' => 'Les erreurs',
            'thumbnail' => 'erreursjs.jpg',
            'description' => 'Découvre comment renvoyer une erreur quand 
            ta fonction reçoit un paramètre qui ne convient pas en JavaScript',
            'category' => Video::CATEGORY_LESSON,
        ],
        [   'video' => 'jslesson.mp4',
            'title' => 'Les promises',
            'thumbnail' => 'promisejs.jpg',
            'description' => 'Découvre la nature asynchrone du JavaScript',
            'category' => Video::CATEGORY_LESSON,
        ],
        [   'video' => 'jslesson.mp4',
            'title' => 'La méthode fetch',
            'thumbnail' => 'fetchjs.jpg',
            'description' => 'Découvre comment faire des appels HTTP afin de 
            récupérer des ressources sur le réseau et utilise le système de promise en JavaScript',
            'category' => Video::CATEGORY_LESSON,
        ],
        [   'video' => 'jslesson.mp4',
            'title' => 'Les modules',
            'thumbnail' => 'modulesjs.jpg',
            'description' => 'Découvre comment morceler le code en plusieurs fichiers 
            afin de mieux l\'organiser en JavaScript',
            'category' => Video::CATEGORY_LESSON,
        ],
        [   'video' => 'jslesson.mp4',
            'title' => 'L\'objet Date',
            'thumbnail' => 'datejs.jpg',
            'description' => 'Découvre comment utiliser l\'objet Date pour 
            représenter une date en JavaScript',
            'category' => Video::CATEGORY_LESSON,
        ],
        [   'video' => 'jslesson.mp4',
            'title' => 'Les écouteurs d\'événements',
            'thumbnail' => 'ecouteursjs.jpg',
            'description' => 'Découvre comment déclencher un script lors d\'un 
            événement particulier en JavaScript',
            'category' => Video::CATEGORY_LESSON,
        ],
    ];
    public const VIDEO_JS_TUTORIEL_DATA = [
        [   'video' => 'jstutoriel.mp4',
            'title' => 'Créer une ToDo liste',
            'thumbnail' => 'todolistjs.jpg',
            'description' => 'Apprends à créer une liste de tâches à faire !',
            'category' => Video::CATEGORY_TUTORIEL,
        ],
        [   'video' => 'jstutoriel.mp4',
            'title' => 'Créer un système de commentaires',
            'thumbnail' => 'commentairesjs.jpg',
            'description' => 'Apprends à créer un espace de commentaires qui 
            charge de nouveaux commentaires lorsqu\'on scroll la page !',
            'category' => Video::CATEGORY_TUTORIEL,
        ],
        [   'video' => 'jstutoriel.mp4',
            'title' => 'Créer un carousel : la base (1/4)',
            'thumbnail' => 'carouseljs1.jpg',
            'description' => 'Apprends à créer un carousel sans recourir à une librairie extérieure !',
            'category' => Video::CATEGORY_TUTORIEL,
        ],
        [   'video' => 'jstutoriel.mp4',
            'title' => 'Créer un carousel : la pagination (2/4)',
            'thumbnail' => 'carouseljs1.jpg',
            'description' => 'Apprends à créer un carousel sans recourir à une librairie extérieure !',
            'category' => Video::CATEGORY_TUTORIEL,
        ],
        [   'video' => 'jstutoriel.mp4',
            'title' => 'Créer un carousel : le défilement (3/4)',
            'thumbnail' => 'carouseljs1.jpg',
            'description' => 'Apprends à créer un carousel sans recourir à une librairie extérieure !',
            'category' => Video::CATEGORY_TUTORIEL,
        ],
        [   'video' => 'jstutoriel.mp4',
            'title' => 'Créer un carousel : le tactile (4/4)',
            'thumbnail' => 'carouseljs1.jpg',
            'description' => 'Apprends à créer un carousel sans recourir à une librairie extérieure !',
            'category' => Video::CATEGORY_TUTORIEL,
        ],
    ];
    public const VIDEO_JS_LIVECODING_DATA = [
        [   'video' => 'jslivecoding.mp4',
            'title' => 'Coder une app Node.js en tant que débutant (1/6)',
            'thumbnail' => 'livecodingjs1.jpg',
            'description' => 'Regarde comment créer une app Node.js à partir de rien. 
            Mise en place des fichiers du site.',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        [   'video' => 'jslivecoding.mp4',
            'title' => 'Coder une app Node.js en tant que débutant (2/6)',
            'thumbnail' => 'livecodingjs1.jpg',
            'description' => 'Regarde comment créer une app Node.js à partir de rien. 
            Mise en place des routes et chargement d\'une API.',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        [   'video' => 'jslivecoding.mp4',
            'title' => 'Coder une app Node.js en tant que débutant (3/6)',
            'thumbnail' => 'livecodingjs1.jpg',
            'description' => 'Regarde comment créer une app Node.js à partir de rien. 
            Utilisation de l\'asynchrone pour récupérer un JSON.',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        [   'video' => 'jslivecoding.mp4',
            'title' => 'Coder une app Node.js en tant que débutant (4/6)',
            'thumbnail' => 'livecodingjs1.jpg',
            'description' => 'Regarde comment créer une app Node.js à partir de rien. 
            Génération dynamique d\'un tag d\'image.',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        [   'video' => 'jslivecoding.mp4',
            'title' => 'Coder une app Node.js en tant que débutant (5/6)',
            'thumbnail' => 'livecodingjs1.jpg',
            'description' => 'Regarde comment créer une app Node.js à partir de rien. 
            Sécuriser la clé API.',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        [   'video' => 'jslivecoding.mp4',
            'title' => 'Coder une app Node.js en tant que débutant (6/6)',
            'thumbnail' => 'livecodingjs1.jpg',
            'description' => 'Regarde comment créer une app Node.js à partir de rien. 
            Styliser et dynamiser le site.',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        [   'video' => 'jslivecoding.mp4',
            'title' => 'Coder une app de sondage en JavaScript (1/15)',
            'thumbnail' => 'livecodingjs2.jpg',
            'description' => 'Regarde comment créer une app JavaScript avec Alex et Chris. 
            Initialisation Git et NPM.',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        [   'video' => 'jslivecoding.mp4',
            'title' => 'Coder une app de sondage en JavaScript (2/15)',
            'thumbnail' => 'livecodingjs2.jpg',
            'description' => 'Regarde comment créer une app JavaScript avec Alex et Chris. 
            Mise en place des outils d\'environnement de code.',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        [   'video' => 'jslivecoding.mp4',
            'title' => 'Coder une app de sondage en JavaScript (3/15)',
            'thumbnail' => 'livecodingjs2.jpg',
            'description' => 'Regarde comment créer une app JavaScript avec Alex et Chris. 
            Mise en place de la base de données. Création des tables et des relations.',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        [   'video' => 'jslivecoding.mp4',
            'title' => 'Coder une app de sondage en JavaScript (4/15)',
            'thumbnail' => 'livecodingjs2.jpg',
            'description' => 'Regarde comment créer une app JavaScript avec Alex et Chris. 
            Création du controlleur des sondages.',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        [   'video' => 'jslivecoding.mp4',
            'title' => 'Coder une app de sondage en JavaScript (5/15)',
            'thumbnail' => 'livecodingjs2.jpg',
            'description' => 'Regarde comment créer une app JavaScript avec Alex et Chris. 
            Gestion des requêtes.',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        [   'video' => 'jslivecoding.mp4',
            'title' => 'Coder une app de sondage en JavaScript (6/15)',
            'thumbnail' => 'livecodingjs2.jpg',
            'description' => 'Regarde comment créer une app JavaScript avec Alex et Chris. 
            Création du controlleur des votes.',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        [   'video' => 'jslivecoding.mp4',
            'title' => 'Coder une app de sondage en JavaScript (7/15)',
            'thumbnail' => 'livecodingjs2.jpg',
            'description' => 'Regarde comment créer une app JavaScript avec Alex et Chris. 
            Création du modèle des votes.',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        [   'video' => 'jslivecoding.mp4',
            'title' => 'Coder une app de sondage en JavaScript (8/15)',
            'thumbnail' => 'livecodingjs2.jpg',
            'description' => 'Regarde comment créer une app JavaScript avec Alex et Chris. 
            Mise en relation des sondages et des votes.',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        [   'video' => 'jslivecoding.mp4',
            'title' => 'Coder une app de sondage en JavaScript (9/15)',
            'thumbnail' => 'livecodingjs2.jpg',
            'description' => 'Regarde comment créer une app JavaScript avec Alex et Chris. 
            Débogage et optimisation du code.',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        [   'video' => 'jslivecoding.mp4',
            'title' => 'Coder une app de sondage en JavaScript (10/15)',
            'thumbnail' => 'livecodingjs2.jpg',
            'description' => 'Regarde comment créer une app JavaScript avec Alex et Chris. 
            Gestion des erreurs.',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        [   'video' => 'jslivecoding.mp4',
            'title' => 'Coder une app de sondage en JavaScript (11/15)',
            'thumbnail' => 'livecodingjs2.jpg',
            'description' => 'Regarde comment créer une app JavaScript avec Alex et Chris. 
            Sécurisation et validation.',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        [   'video' => 'jslivecoding.mp4',
            'title' => 'Coder une app de sondage en JavaScript (12/15)',
            'thumbnail' => 'livecodingjs2.jpg',
            'description' => 'Regarde comment créer une app JavaScript avec Alex et Chris. 
            Mise en place de Webpack.',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        [   'video' => 'jslivecoding.mp4',
            'title' => 'Coder une app de sondage en JavaScript (13/15)',
            'thumbnail' => 'livecodingjs2.jpg',
            'description' => 'Regarde comment créer une app JavaScript avec Alex et Chris. 
            Création des composants Resultat et Vote.',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        [   'video' => 'jslivecoding.mp4',
            'title' => 'Coder une app de sondage en JavaScript (14/15)',
            'thumbnail' => 'livecodingjs2.jpg',
            'description' => 'Regarde comment créer une app JavaScript avec Alex et Chris. 
            Styliser et dynamiser.',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        [   'video' => 'jslivecoding.mp4',
            'title' => 'Coder une app de sondage en JavaScript (15/15)',
            'thumbnail' => 'livecodingjs2.jpg',
            'description' => 'Regarde comment créer une app JavaScript avec Alex et Chris. 
            Télécharger le code sur GitHub.',
            'category' => Video::CATEGORY_LIVECODING,
        ],
    ];

    public const VIDEO_PHP_LESSON_DATA = [
        [   'video' => 'phplesson.mp4',
            'title' => 'L\'installation',
            'thumbnail' => 'installationphp.jpg',
            'description' => 'Les différentes méthodes d\'installation de PHP en fonction 
            de ton système d\'exploitation',
            'category' => Video::CATEGORY_LESSON,
        ],
        [   'video' => 'phplesson.mp4',
            'title' => 'Les variables',
            'thumbnail' => 'variablesphp.jpg',
            'description' => 'Découvre comment créer des variables en PHP',
            'category' => Video::CATEGORY_LESSON,
        ],
        [   'video' => 'phplesson.mp4',
            'title' => 'Les tableaux',
            'thumbnail' => 'tableauxphp.jpg',
            'description' => 'Découvre comment créer des tableaux en PHP',
            'category' => Video::CATEGORY_LESSON,
        ],
        [   'video' => 'phplesson.mp4',
            'title' => 'Les conditions',
            'thumbnail' => 'conditionsphp.jpg',
            'description' => 'Découvre comment écrire des opérateurs conditionnels pour 
            prendre des décisions dans ton code PHP',
            'category' => Video::CATEGORY_LESSON,
        ],
        [   'video' => 'phplesson.mp4',
            'title' => 'Les boucles',
            'thumbnail' => 'bouclesphp.jpg',
            'description' => 'Découvre comment écrire des boucles pour pouvoir itérer dans ton code PHP',
            'category' => Video::CATEGORY_LESSON,
        ],
        [   'video' => 'phplesson.mp4',
            'title' => 'Les fonctions',
            'thumbnail' => 'fonctionsphp.jpg',
            'description' => 'Découvre comment écrire des fonctions afin de pouvoir réutiliser du code',
            'category' => Video::CATEGORY_LESSON,
        ],
        [   'video' => 'phplesson.mp4',
            'title' => 'Require & Include',
            'thumbnail' => 'requirephp.jpg',
            'description' => 'Découvre comment inclure et requérir un autre fichier dans ton code',
            'category' => Video::CATEGORY_LESSON,
        ],
        [   'video' => 'phplesson.mp4',
            'title' => 'Les formulaires',
            'thumbnail' => 'formulairesphp.jpg',
            'description' => 'Découvre comment traiter et sécuriser les formulaires en PHP',
            'category' => Video::CATEGORY_LESSON,
        ],
        [   'video' => 'phplesson.mp4',
            'title' => 'Les dates',
            'thumbnail' => 'datesphp.jpg',
            'description' => 'Découvre comment manipuler les dates en PHP',
            'category' => Video::CATEGORY_LESSON,
        ],
        [   'video' => 'phplesson.mp4',
            'title' => 'Les sessions',
            'thumbnail' => 'sessionphp.jpg',
            'description' => 'Découvre comment utiliser les sessions en PHP',
            'category' => Video::CATEGORY_LESSON,
        ],
        [   'video' => 'phplesson.mp4',
            'title' => 'Les classes',
            'thumbnail' => 'classesphp.jpg',
            'description' => 'Découvre l\'intérêt des classes en PHP',
            'category' => Video::CATEGORY_LESSON,
        ],
        [   'video' => 'phplesson.mp4',
            'title' => 'Le mot-clé static',
            'thumbnail' => 'staticphp.jpg',
            'description' => 'Découvre le mot-clé static en PHP',
            'category' => Video::CATEGORY_LESSON,
        ],
        [   'video' => 'phplesson.mp4',
            'title' => 'L\'héritage',
            'thumbnail' => 'heritagephp.jpg',
            'description' => 'Découvre la notion d\'héritage en PHP',
            'category' => Video::CATEGORY_LESSON,
        ],
        [   'video' => 'phplesson.mp4',
            'title' => 'Les exceptions',
            'thumbnail' => 'exceptionsphp.jpg',
            'description' => 'Découvre les exceptions en PHP',
            'category' => Video::CATEGORY_LESSON,
        ],
        [   'video' => 'phplesson.mp4',
            'title' => 'La PDO',
            'thumbnail' => 'pdophp.jpg',
            'description' => 'Découvre comment accéder à ta base de données en PHP avec PDO',
            'category' => Video::CATEGORY_LESSON,
        ],
        [   'video' => 'phplesson.mp4',
            'title' => 'Les namespaces',
            'thumbnail' => 'namespacephp.jpg',
            'description' => 'Découvre l\'attribution d\'un namespace en PHP',
            'category' => Video::CATEGORY_LESSON,
        ],
        [   'video' => 'phplesson.mp4',
            'title' => 'L\'autoloader',
            'thumbnail' => 'autoloaderphp.jpg',
            'description' => 'Découvre l\'importance et la praticité de l\'autoloader en PHP',
            'category' => Video::CATEGORY_LESSON,
        ],
        [   'video' => 'phplesson.mp4',
            'title' => 'Composer',
            'thumbnail' => 'composerphp.jpg',
            'description' => 'Découvre comment utiliser des librairies tierces en PHP grâce à Composer',
            'category' => Video::CATEGORY_LESSON,
        ],
        [   'video' => 'phplesson.mp4',
            'title' => 'Le Query Builder',
            'thumbnail' => 'querybuilderphp.jpg',
            'description' => 'Découvre comment construire une requête personnalisée 
            en PHP grâce au Query Builder',
            'category' => Video::CATEGORY_LESSON,
        ],
        [   'video' => 'phplesson.mp4',
            'title' => 'La pagination',
            'thumbnail' => 'paginationphp.jpg',
            'description' => 'Découvre comment paginer tes pages en PHP',
            'category' => Video::CATEGORY_LESSON,
        ],
    ];

    public const VIDEO_PHP_TUTORIEL_DATA = [
        [   'video' => 'phptutoriel.mp4',
            'title' => 'Créer un compteur de vues',
            'thumbnail' => 'vuesphp.jpg',
            'description' => 'Découvre comment intégrer un compteur de visites sur ton site en PHP',
            'category' => Video::CATEGORY_TUTORIEL,
        ],
        [   'video' => 'phptutoriel.mp4',
            'title' => 'Créer un dashboard',
            'thumbnail' => 'dashboardphp.jpg',
            'description' => 'Découvre comment mettre en place un dashboard administrateur sur 
            ton site en PHP',
            'category' => Video::CATEGORY_TUTORIEL,
        ],
        [   'video' => 'phptutoriel.mp4',
            'title' => 'Mettre en place un système de connexion',
            'thumbnail' => 'authphp.jpg',
            'description' => 'Découvre comment mettre en place un système de connexion 
            sur ton site en PHP',
            'category' => Video::CATEGORY_TUTORIEL,
        ],
        [   'video' => 'phptutoriel.mp4',
            'title' => 'Mettre en place un livre d\'or',
            'thumbnail' => 'livrephp.jpg',
            'description' => 'Découvre comment mettre en place un livre d\'or sur ton site en PHP',
            'category' => Video::CATEGORY_TUTORIEL,
        ],
    ];

    public const VIDEO_PHP_LIVECODING_DATA = [
        [   'video' => 'phplivecoding.mp4',
            'title' => 'Développer un site de recettes en PHP avec Symfony (1/19)',
            'thumbnail' => 'livecodingphp1.jpg',
            'description' => 'Découvre comment créer un site de A à Z en PHP : 
            installation et configuration du projet',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        [   'video' => 'phplivecoding.mp4',
            'title' => 'Développer un site de recettes en PHP avec Symfony (2/19)',
            'thumbnail' => 'livecodingphp2.jpg',
            'description' => 'Découvre comment créer un site de A à Z en PHP : 
            controller, routing et twig',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        [   'video' => 'phplivecoding.mp4',
            'title' => 'Développer un site de recettes en PHP avec Symfony (3/19)',
            'thumbnail' => 'livecodingphp3.jpg',
            'description' => 'Découvre comment créer un site de A à Z en PHP : 
            première page avec twig',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        [   'video' => 'phplivecoding.mp4',
            'title' => 'Développer un site de recettes en PHP avec Symfony (4/19)',
            'thumbnail' => 'livecodingphp4.jpg',
            'description' => 'Découvre comment créer un site de A à Z en PHP : 
            première entité, présentation de l\'ORM Doctrine',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        [   'video' => 'phplivecoding.mp4',
            'title' => 'Développer un site de recettes en PHP avec Symfony (5/19)',
            'thumbnail' => 'livecodingphp5.jpg',
            'description' => 'Découvre comment créer un site de A à Z en PHP : 
            validation des données',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        [   'video' => 'phplivecoding.mp4',
            'title' => 'Développer un site de recettes en PHP avec Symfony (6/19)',
            'thumbnail' => 'livecodingphp6.jpg',
            'description' => 'Découvre comment créer un site de A à Z en PHP : 
            créer des fixtures',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        [   'video' => 'phplivecoding.mp4',
            'title' => 'Développer un site de recettes en PHP avec Symfony (7/19)',
            'thumbnail' => 'livecodingphp7.jpg',
            'description' => 'Découvre comment créer un site de A à Z en PHP : 
            faire un CRUD (create, read, update, delete)',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        [   'video' => 'phplivecoding.mp4',
            'title' => 'Développer un site de recettes en PHP avec Symfony (8/19)',
            'thumbnail' => 'livecodingphp8.jpg',
            'description' => 'Découvre comment créer un site de A à Z en PHP : 
            sécurité, user et hachage de mot de passe',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        [   'video' => 'phplivecoding.mp4',
            'title' => 'Développer un site de recettes en PHP avec Symfony (9/19)',
            'thumbnail' => 'livecodingphp9.jpg',
            'description' => 'Découvre comment créer un site de A à Z en PHP : 
            créer un formulaire d\'inscription',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        [   'video' => 'phplivecoding.mp4',
            'title' => 'Développer un site de recettes en PHP avec Symfony (10/19)',
            'thumbnail' => 'livecodingphp10.jpg',
            'description' => 'Découvre comment créer un site de A à Z en PHP : 
            relations et query builder',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        [   'video' => 'phplivecoding.mp4',
            'title' => 'Développer un site de recettes en PHP avec Symfony (11/19)',
            'thumbnail' => 'livecodingphp11.jpg',
            'description' => 'Découvre comment créer un site de A à Z en PHP : 
            l\'accès au routes avec is_granted()',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        [   'video' => 'phplivecoding.mp4',
            'title' => 'Développer un site de recettes en PHP avec Symfony (12/19)',
            'thumbnail' => 'livecodingphp12.jpg',
            'description' => 'Découvre comment créer un site de A à Z en PHP : 
            l\'upload d\'images avec VichUploader',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        [   'video' => 'phplivecoding.mp4',
            'title' => 'Développer un site de recettes en PHP avec Symfony (13/19)',
            'thumbnail' => 'livecodingphp13.jpg',
            'description' => 'Découvre comment créer un site de A à Z en PHP : 
            refactorisation',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        [   'video' => 'phplivecoding.mp4',
            'title' => 'Développer un site de recettes en PHP avec Symfony (14/19)',
            'thumbnail' => 'livecodingphp14.jpg',
            'description' => 'Découvre comment créer un site de A à Z en PHP : 
            créer un formulaire de contact',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        [   'video' => 'phplivecoding.mp4',
            'title' => 'Développer un site de recettes en PHP avec Symfony (15/19)',
            'thumbnail' => 'livecodingphp15.jpg',
            'description' => 'Découvre comment créer un site de A à Z en PHP : 
            envoyer des emails',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        [   'video' => 'phplivecoding.mp4',
            'title' => 'Développer un site de recettes en PHP avec Symfony (16/19)',
            'thumbnail' => 'livecodingphp16.jpg',
            'description' => 'Découvre comment créer un site de A à Z en PHP : 
            la mise en place de services',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        [   'video' => 'phplivecoding.mp4',
            'title' => 'Développer un site de recettes en PHP avec Symfony (17/19)',
            'thumbnail' => 'livecodingphp17.jpg',
            'description' => 'Découvre comment créer un site de A à Z en PHP : 
            système d\'administration avec EasyAdmin',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        [   'video' => 'phplivecoding.mp4',
            'title' => 'Développer un site de recettes en PHP avec Symfony (18/19)',
            'thumbnail' => 'livecodingphp18.jpg',
            'description' => 'Découvre comment créer un site de A à Z en PHP : 
            mise en place des tests',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        [   'video' => 'phplivecoding.mp4',
            'title' => 'Développer un site de recettes en PHP avec Symfony (19/19)',
            'thumbnail' => 'livecodingphp19.jpg',
            'description' => 'Découvre comment créer un site de A à Z en PHP : 
            Webpack Encore, JavaScript et CSS',
            'category' => Video::CATEGORY_LIVECODING,
        ],
    ];

    public const VIDEO_HTML_LESSON_DATA = [
        [   'video' => 'htmllesson.mp4',
            'title' => 'Introduction',
            'thumbnail' => 'htmllesson1.jpg',
            'description' => 'Introduction à la conception de pages web',
            'category' => Video::CATEGORY_LESSON,
        ],
        [   'video' => 'htmllesson.mp4',
            'title' => 'Première page web',
            'thumbnail' => 'htmllesson2.jpg',
            'description' => 'Découvre les fondamentaux qui constituent une page web',
            'category' => Video::CATEGORY_LESSON,
        ],
        [   'video' => 'htmllesson.mp4',
            'title' => 'Les balises',
            'thumbnail' => 'htmllesson3.jpg',
            'description' => 'Découvre les principales balises qui constituent une structure HTML',
            'category' => Video::CATEGORY_LESSON,
        ],
        [   'video' => 'htmllesson.mp4',
            'title' => 'Le formatage (1/2)',
            'thumbnail' => 'htmllesson4.jpg',
            'description' => 'Découvre comment formater ton texte en HTML',
            'category' => Video::CATEGORY_LESSON,
        ],
        [   'video' => 'htmllesson.mp4',
            'title' => 'Le formatage (2/2)',
            'thumbnail' => 'htmllesson5.jpg',
            'description' => 'Découvre comment formater ton texte en HTML',
            'category' => Video::CATEGORY_LESSON,
        ],
        [   'video' => 'htmllesson.mp4',
            'title' => 'Les listes',
            'thumbnail' => 'htmllesson6.jpg',
            'description' => 'Découvre comment créer des listes ordonnées et non ordonnées en HTML',
            'category' => Video::CATEGORY_LESSON,
        ],
        [   'video' => 'htmllesson.mp4',
            'title' => 'Les tableaux',
            'thumbnail' => 'htmllesson7.jpg',
            'description' => 'Découvre comment créer des tableaux en HTML',
            'category' => Video::CATEGORY_LESSON,
        ],
        [   'video' => 'htmllesson.mp4',
            'title' => 'Les images',
            'thumbnail' => 'htmllesson8.jpg',
            'description' => 'Découvre comment importer des images dans ta page web en HTML',
            'category' => Video::CATEGORY_LESSON,
        ],
    ];

    public const VIDEO_CSS_LESSON_DATA = [
        [   'video' => 'csslesson.mp4',
            'title' => 'Les sélecteurs',
            'thumbnail' => 'selecteurscss.jpg',
            'description' => 'Découvre comment utiliser les sélecteurs en CSS pour styliser ta page',
            'category' => Video::CATEGORY_LESSON,
        ],
        [   'video' => 'csslesson.mp4',
            'title' => 'Le modèle de boîte',
            'thumbnail' => 'boitescss.jpg',
            'description' => 'Découvre comment manipuler les modèles de boîte 
            en CSS pour styliser ta page',
            'category' => Video::CATEGORY_LESSON,
        ],
        [   'video' => 'csslesson.mp4',
            'title' => 'Les polices',
            'thumbnail' => 'textescss.jpg',
            'description' => 'Découvre comment styliser tes textes en CSS',
            'category' => Video::CATEGORY_LESSON,
        ],
        [   'video' => 'csslesson.mp4',
            'title' => 'Les formats de couleurs',
            'thumbnail' => 'couleurscss.jpg',
            'description' => 'Découvre comment colorer ta page en CSS',
            'category' => Video::CATEGORY_LESSON,
        ],
        [   'video' => 'csslesson.mp4',
            'title' => 'Les unités de mesure',
            'thumbnail' => 'unitescss.jpg',
            'description' => 'Découvre les différentes unités de mesure pour styliser ta page en CSS',
            'category' => Video::CATEGORY_LESSON,
        ],
        [   'video' => 'csslesson.mp4',
            'title' => 'Le positionnement',
            'thumbnail' => 'positionnementcss.jpg',
            'description' => 'Découvre comment positionner les différents éléments d\'une page en CSS',
            'category' => Video::CATEGORY_LESSON,
        ],
        [   'video' => 'csslesson.mp4',
            'title' => 'Les éléments flottants',
            'thumbnail' => 'floatcss.jpg',
            'description' => 'Découvre comment manipuler les éléments flottants d\'une page en CSS',
            'category' => Video::CATEGORY_LESSON,
        ],
        [   'video' => 'csslesson.mp4',
            'title' => 'La propriété background',
            'thumbnail' => 'backgroundcss.jpg',
            'description' => 'Découvre comment utiliser la propriété background dans ta page en CSS',
            'category' => Video::CATEGORY_LESSON,
        ],
        [   'video' => 'csslesson.mp4',
            'title' => 'Transform',
            'thumbnail' => 'transformcss.jpg',
            'description' => 'Découvre comment transformer un élément dans ta page en CSS',
            'category' => Video::CATEGORY_LESSON,
        ],
        [   'video' => 'csslesson.mp4',
            'title' => 'Animation',
            'thumbnail' => 'animationcss.jpg',
            'description' => 'Découvre comment animer un élément dans ta page en CSS',
            'category' => Video::CATEGORY_LESSON,
        ],
        [   'video' => 'csslesson.mp4',
            'title' => 'Responsive et media query',
            'thumbnail' => 'responsivecss.jpg',
            'description' => 'Découvre comment rendre ta page responsive avec les medias queries en CSS',
            'category' => Video::CATEGORY_LESSON,
        ],
    ];

    public const VIDEO_CSS_TUTORIEL_DATA = [
        [   'video' => 'csstutoriel.mp4',
            'title' => 'Créer un effet de parallaxe',
            'thumbnail' => 'parallaxecss.jpg',
            'description' => 'Découvre comment mettre en place un effet de 
            parallaxe en CSS pour styliser ta page',
            'category' => Video::CATEGORY_TUTORIEL,
        ],
        [   'video' => 'csstutoriel.mp4',
            'title' => 'Créer une zoombox',
            'thumbnail' => 'zoomboxcss.jpg',
            'description' => 'Découvre comment mettre en place un effet de 
            zoombox en CSS pour styliser ta page',
            'category' => Video::CATEGORY_TUTORIEL,
        ],
        [   'video' => 'csstutoriel.mp4',
            'title' => 'Créer un triangle',
            'thumbnail' => 'trianglescss.jpg',
            'description' => 'Découvre comment créer des triangles en CSS pour styliser ta page',
            'category' => Video::CATEGORY_TUTORIEL,
        ],
        [   'video' => 'csstutoriel.mp4',
            'title' => 'Rendre les vidéos responsives',
            'thumbnail' => 'responsivevideocss.jpg',
            'description' => 'Découvre comment rendre tes vidéos responsives en CSS ',
            'category' => Video::CATEGORY_TUTORIEL,
        ],
        [   'video' => 'csstutoriel.mp4',
            'title' => 'Créer un menu déroulant',
            'thumbnail' => 'menucss.jpg',
            'description' => 'Découvre comment créer un menu déroulant en CSS pour styliser ta page',
            'category' => Video::CATEGORY_TUTORIEL,
        ],
        [   'video' => 'csstutoriel.mp4',
            'title' => 'Personnaliser un formulaire',
            'thumbnail' => 'formulairecss.jpg',
            'description' => 'Découvre comment personnaliser un formulaire en CSS',
            'category' => Video::CATEGORY_TUTORIEL,
        ],
        [   'video' => 'csstutoriel.mp4',
            'title' => 'Personnaliser un bouton',
            'thumbnail' => 'boutonscss.jpg',
            'description' => 'Découvre comment personnaliser un bouton en CSS',
            'category' => Video::CATEGORY_TUTORIEL,
        ],
        [   'video' => 'csstutoriel.mp4',
            'title' => 'Utiliser :before et :after',
            'thumbnail' => 'beforeaftercss.jpg',
            'description' => 'Découvre comment utiliser les propriétés :before et :after en CSS',
            'category' => Video::CATEGORY_TUTORIEL,
        ],
    ];

    public const VIDEO_CSS_LIVECODING_DATA = [
        [   'video' => 'csslivecoding.mp4',
            'title' => 'Création d\'un site web responsive à partir de rien (1/7)',
            'thumbnail' => 'livecodingcss1.jpg',
            'description' => 'Découvre comment créer un site web responsive à partir de rien : 
            créer une barre de navigation',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        [   'video' => 'csslivecoding.mp4',
            'title' => 'Création d\'un site web responsive à partir de rien (2/7)',
            'thumbnail' => 'livecodingcss2.jpg',
            'description' => 'Découvre comment créer un site web responsive à partir de rien : 
            créer un menu hamburger animé',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        [   'video' => 'csslivecoding.mp4',
            'title' => 'Création d\'un site web responsive à partir de rien (3/7)',
            'thumbnail' => 'livecodingcss3.jpg',
            'description' => 'Découvre comment créer un site web responsive à partir de rien : 
            créer un menu mobile animé',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        [   'video' => 'csslivecoding.mp4',
            'title' => 'Création d\'un site web responsive à partir de rien (4/7)',
            'thumbnail' => 'livecodingcss4.jpg',
            'description' => 'Découvre comment créer un site web responsive à partir de rien : 
            rendre la page principale responsive',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        [   'video' => 'csslivecoding.mp4',
            'title' => 'Création d\'un site web responsive à partir de rien (5/7)',
            'thumbnail' => 'livecodingcss5.jpg',
            'description' => 'Découvre comment créer un site web responsive à partir de rien : 
            utiliser les flexbox pour construire un layout responsive',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        [   'video' => 'csslivecoding.mp4',
            'title' => 'Création d\'un site web responsive à partir de rien (6/7)',
            'thumbnail' => 'livecodingcss6.jpg',
            'description' => 'Découvre comment créer un site web responsive à partir de rien : 
            utiliser les grid pour construire un layout responsive',
            'category' => Video::CATEGORY_LIVECODING,
        ],
        [   'video' => 'csslivecoding.mp4',
            'title' => 'Création d\'un site web responsive à partir de rien (7/7)',
            'thumbnail' => 'livecodingcss7.jpg',
            'description' => 'Découvre comment créer un site web responsive à partir de rien : 
            créer un footer',
            'category' => Video::CATEGORY_LIVECODING,
        ],
    ];

    private SluggerInterface $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public function load(ObjectManager $manager): void
    {
        foreach (self::VIDEO_JS_LESSON_DATA as $properties) {
            $video = new Video();
            $video->setVideo($properties['video']);
            $video->setTitle($properties['title']);
            $video->setThumbnail($properties['thumbnail']);
            $video->setDescription($properties['description']);
            $video->setCategory($properties['category']);
            $video->setLanguage($this->getReference('JSLanguage'));
            $video->setSlug($this->slugger->slug($video->getTitle()));

            $this->setReference('JSLanguage - ' . $video->getTitle(), $video);

            $manager->persist($video);
        }

        foreach (self::VIDEO_JS_TUTORIEL_DATA as $properties) {
            $video = new Video();
            $video->setVideo($properties['video']);
            $video->setTitle($properties['title']);
            $video->setThumbnail($properties['thumbnail']);
            $video->setDescription($properties['description']);
            $video->setCategory($properties['category']);
            $video->setLanguage($this->getReference('JSLanguage'));
            $video->setSlug($this->slugger->slug($video->getTitle()));

            $this->setReference('JSLanguage - ' . $video->getTitle(), $video);

            $manager->persist($video);
        }

        foreach (self::VIDEO_JS_LIVECODING_DATA as $properties) {
            $video = new Video();
            $video->setVideo($properties['video']);
            $video->setTitle($properties['title']);
            $video->setThumbnail($properties['thumbnail']);
            $video->setDescription($properties['description']);
            $video->setCategory($properties['category']);
            $video->setLanguage($this->getReference('JSLanguage'));
            $video->setSlug($this->slugger->slug($video->getTitle()));

            $this->setReference('JSLanguage - ' . $video->getTitle(), $video);

            $manager->persist($video);
        }

        foreach (self::VIDEO_PHP_LESSON_DATA as $properties) {
            $video = new Video();
            $video->setVideo($properties['video']);
            $video->setTitle($properties['title']);
            $video->setThumbnail($properties['thumbnail']);
            $video->setDescription($properties['description']);
            $video->setCategory($properties['category']);
            $video->setLanguage($this->getReference('PHPLanguage'));
            $video->setSlug($this->slugger->slug($video->getTitle()));

            $this->setReference('PHPLanguage - ' . $video->getTitle(), $video);

            $manager->persist($video);
        }

        foreach (self::VIDEO_PHP_TUTORIEL_DATA as $properties) {
            $video = new Video();
            $video->setVideo($properties['video']);
            $video->setTitle($properties['title']);
            $video->setThumbnail($properties['thumbnail']);
            $video->setDescription($properties['description']);
            $video->setCategory($properties['category']);
            $video->setLanguage($this->getReference('PHPLanguage'));
            $video->setSlug($this->slugger->slug($video->getTitle()));

            $this->setReference('PHPLanguage - ' . $video->getTitle(), $video);

            $manager->persist($video);
        }

        foreach (self::VIDEO_PHP_LIVECODING_DATA as $properties) {
            $video = new Video();
            $video->setVideo($properties['video']);
            $video->setTitle($properties['title']);
            $video->setThumbnail($properties['thumbnail']);
            $video->setDescription($properties['description']);
            $video->setCategory($properties['category']);
            $video->setLanguage($this->getReference('PHPLanguage'));
            $video->setSlug($this->slugger->slug($video->getTitle()));

            $this->setReference('PHPLanguage - ' . $video->getTitle(), $video);

            $manager->persist($video);
        }

        foreach (self::VIDEO_HTML_LESSON_DATA as $properties) {
            $video = new Video();
            $video->setVideo($properties['video']);
            $video->setTitle($properties['title']);
            $video->setThumbnail($properties['thumbnail']);
            $video->setDescription($properties['description']);
            $video->setCategory($properties['category']);
            $video->setLanguage($this->getReference('HTMLLanguage'));
            $video->setSlug($this->slugger->slug($video->getTitle()));

            $this->setReference('HTMLLanguage - ' . $video->getTitle(), $video);

            $manager->persist($video);
        }

        foreach (self::VIDEO_CSS_LESSON_DATA as $properties) {
            $video = new Video();
            $video->setVideo($properties['video']);
            $video->setTitle($properties['title']);
            $video->setThumbnail($properties['thumbnail']);
            $video->setDescription($properties['description']);
            $video->setCategory($properties['category']);
            $video->setLanguage($this->getReference('CSSLanguage'));
            $video->setSlug($this->slugger->slug($video->getTitle()));

            $this->setReference('CSSLanguage - ' . $video->getTitle(), $video);

            $manager->persist($video);
        }

        foreach (self::VIDEO_CSS_TUTORIEL_DATA as $properties) {
            $video = new Video();
            $video->setVideo($properties['video']);
            $video->setTitle($properties['title']);
            $video->setThumbnail($properties['thumbnail']);
            $video->setDescription($properties['description']);
            $video->setCategory($properties['category']);
            $video->setLanguage($this->getReference('CSSLanguage'));
            $video->setSlug($this->slugger->slug($video->getTitle()));

            $this->setReference('CSSLanguage - ' . $video->getTitle(), $video);

            $manager->persist($video);
        }

        foreach (self::VIDEO_CSS_LIVECODING_DATA as $properties) {
            $video = new Video();
            $video->setVideo($properties['video']);
            $video->setTitle($properties['title']);
            $video->setThumbnail($properties['thumbnail']);
            $video->setDescription($properties['description']);
            $video->setCategory($properties['category']);
            $video->setLanguage($this->getReference('CSSLanguage'));
            $video->setSlug($this->slugger->slug($video->getTitle()));

            $this->setReference('CSSLanguage - ' . $video->getTitle(), $video);

            $manager->persist($video);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            LanguageFixtures::class,
        ];
    }
}
