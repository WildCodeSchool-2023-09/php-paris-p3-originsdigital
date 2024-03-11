<?php

namespace App\DataFixtures;

use App\Entity\Answer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AnswerFixtures extends Fixture implements DependentFixtureInterface
{
    public const COURSES = [
        'course_0' => [
            'question_1' => [
                'answer_1' => [
                    'label' => 'Je veux entamer une reconversion professionnelle',
                    'is_correct' => false,
                ],
                'answer_2' => [
                    'label' => 'Je veux apprendre pour un projet personnel',
                    'is_correct' => false,
                ],
            ],
            'question_2' => [
                'answer_1' => [
                    'label' => 'Je me consacre à la formation à plein temps',
                    'is_correct' => false,
                ],
                'answer_2' => [
                    'label' => 'Je peux travailler quelques heures par jour',
                    'is_correct' => false,
                ],
                'answer_3' => [
                    'label' => 'Je peux travailler quelques heures par semaine',
                    'is_correct' => false,
                ],
            ],
            'question_3' => [
                'answer_1' => [
                    'label' => 'Je n\'ai jamais codé',
                    'is_correct' => false,
                ],
                'answer_2' => [
                    'label' => 'J\'ai les notions fondamentales basiques',
                    'is_correct' => false,
                ],
                'answer_3' => [
                    'label' => 'J\'ai déjà suivi des cours dans un langage
                                et je souhaite me perfectionner dans celui-ci',
                    'is_correct' => false,
                ],
                'answer_4' => [
                    'label' => 'Je maîtrise un langage et je souhaite en apprendre un nouveau',
                    'is_correct' => false,
                ],
            ],
            'question_4' => [
                'answer_1' => [
                    'label' => 'PHP',
                    'is_correct' => false,
                ],
                'answer_2' => [
                    'label' => 'JS',
                    'is_correct' => false,
                ],
            ],
        ],
        'course_1' => [
            'question_1' => [
                'answer_1' => [
                    'label' => 'Elle définit le contenu principal de la page',
                    'is_correct' => false,
                ],
                'answer_2' => [
                    'label' => 'Elle crée une zone de navigation pour les liens internes',
                    'is_correct' => false,
                ],
                'answer_3' => [
                    'label' => 'Elle spécifie la structure et le style de la page',
                    'is_correct' => false,
                ],
                'answer_4' => [
                    'label' => 'Elle contient des métadonnées et des liens vers des fichiers externes
                                tels que les feuilles de style et les scripts JavaScript',
                    'is_correct' => true,
                ],
            ],
            'question_2' => [
                'answer_1' => [
                    'label' => '<image src="image.jpg" alt="Description">',
                    'is_correct' => false,
                ],
                'answer_2' => [
                    'label' => '<img href="image.jpg" alt="Description">',
                    'is_correct' => false,
                ],
                'answer_3' => [
                    'label' => '<img src="image.jpg" alt="Description">',
                    'is_correct' => true,
                ],
                'answer_4' => [
                    'label' => '<picture source="image.jpg" alt="Description">',
                    'is_correct' => false,
                ],
            ],
            'question_3' => [
                'answer_1' => [
                    'label' => 'text-align: center;',
                    'is_correct' => false,
                ],
                'answer_2' => [
                    'label' => 'margin: 0 auto;',
                    'is_correct' => true,
                ],
                'answer_3' => [
                    'label' => 'align-items: center;',
                    'is_correct' => false,
                ],
                'answer_4' => [
                    'label' => 'horizontal-align: center;',
                    'is_correct' => false,
                ],
            ],
            'question_4' => [
                'answer_1' => [
                    'label' => 'Le margin est l\'espace à l\'intérieur d\'un élément,
                                tandis que le padding est l\'espace à l\'extérieur',
                    'is_correct' => false,
                ],
                'answer_2' => [
                    'label' => 'Le margin est l\'espace à l\'extérieur d\'un élément,
                                tandis que le padding est l\'espace à l\'intérieur',
                    'is_correct' => true,
                ],
                'answer_3' => [
                    'label' => 'Margin et padding sont interchangeables et peuvent
                                être utilisés de manière interchangeable',
                    'is_correct' => false,
                ],
                'answer_4' => [
                    'label' => 'Margin et padding sont utilisés pour la même chose
                                et n\'ont pas de différence',
                    'is_correct' => false,
                ],
            ],
            'question_5' => [
                'answer_1' => [
                    'label' => '== est utilisé pour la comparaison stricte,
                                tandis que === est utilisé pour la comparaison faible',
                    'is_correct' => false,
                ],
                'answer_2' => [
                    'label' => '== compare la valeur et le type de deux variables,
                                tandis que === compare uniquement la valeur',
                    'is_correct' => false,
                ],
                'answer_3' => [
                    'label' => '== compare la valeur de deux variables,
                                tandis que === compare la valeur et le type de données',
                    'is_correct' => true,
                ],
                'answer_4' => [
                    'label' => '== et === sont identiques et peuvent
                                être utilisés de manière interchangeable',
                    'is_correct' => false,
                ],
            ],
            'question_6' => [
                'answer_1' => [
                    'label' => 'Un langage de programmation',
                    'is_correct' => false,
                ],
                'answer_2' => [
                    'label' => 'Un ensemble d\'outils et de conventions
                                de codage préétablies facilitant le développement',
                    'is_correct' => true,
                ],
                'answer_3' => [
                    'label' => 'Un navigateur web populaire',
                    'is_correct' => false,
                ],
                'answer_4' => [
                    'label' => 'Un éditeur de texte avancé',
                    'is_correct' => false,
                ],
            ],
            'question_7' => [
                'answer_1' => [
                    'label' => 'Afficher des pages web',
                    'is_correct' => false,
                ],
                'answer_2' => [
                    'label' => 'Exécuter des scripts JavaScript',
                    'is_correct' => false,
                ],
                'answer_3' => [
                    'label' => 'Stocker des fichiers texte',
                    'is_correct' => false,
                ],
                'answer_4' => [
                    'label' => 'Gérer les données de manière structurée et
                                établir des relations entre les tables',
                    'is_correct' => true,
                ],
            ],
            'question_8' => [
                'answer_1' => [
                    'label' => 'Créatif',
                    'is_correct' => true,
                ],
                'answer_2' => [
                    'label' => 'Logique',
                    'is_correct' => true,
                ],
            ],
        ],
        'course_2' => [
            'question_1' => [
                'answer_1' => [
                    'label' => '% Commentaire %',
                    'is_correct' => false,
                ],
                'answer_2' => [
                    'label' => '/* Commentaire */ ',
                    'is_correct' => true,
                ],
                'answer_3' => [
                    'label' => '-- Commentaire -- ',
                    'is_correct' => false,
                ],
                'answer_4' => [
                    'label' => '# Commentaire',
                    'is_correct' => false,
                ],
            ],
            'question_2' => [
                'answer_1' => [
                    'label' => 'echo()',
                    'is_correct' => false,
                ],
                'answer_2' => [
                    'label' => 'print()',
                    'is_correct' => true,
                ],
                'answer_3' => [
                    'label' => 'display()',
                    'is_correct' => false,
                ],
                'answer_4' => [
                    'label' => 'show()',
                    'is_correct' => false,
                ],
            ],
            'question_3' => [
                'answer_1' => [
                    'label' => 'variable $nom_variable;',
                    'is_correct' => false,
                ],
                'answer_2' => [
                    'label' => 'let nom_variable = "valeur";',
                    'is_correct' => false,
                ],
                'answer_3' => [
                    'label' => '$nom_variable = "valeur";',
                    'is_correct' => true,
                ],
                'answer_4' => [
                    'label' => 'variable nom_variable = "valeur";',
                    'is_correct' => false,
                ],
            ],
            'question_4' => [
                'answer_1' => [
                    'label' => 'include("fichier.php");',
                    'is_correct' => true,
                ],
                'answer_2' => [
                    'label' => 'require("fichier.php");',
                    'is_correct' => false,
                ],
                'answer_3' => [
                    'label' => 'import("fichier.php");',
                    'is_correct' => false,
                ],
                'answer_4' => [
                    'label' => 'load("fichier.php");',
                    'is_correct' => false,
                ],
            ],
            'question_5' => [
                'answer_1' => [
                    'label' => 'En utilisant des balises HTML spéciales',
                    'is_correct' => false,
                ],
                'answer_2' => [
                    'label' => 'En désactivant la base de données',
                    'is_correct' => false,
                ],
                'answer_3' => [
                    'label' => 'En utilisant le mode strict de PHP',
                    'is_correct' => false,
                ],
                'answer_4' => [
                    'label' => 'En échappant les caractères spéciaux dans les requêtes SQL',
                    'is_correct' => true,
                ],
            ],
            'question_6' => [
                'answer_1' => [
                    'label' => 'GET est utilisé pour les requêtes asynchrones,
                                POST pour les requêtes synchrones',
                    'is_correct' => false,
                ],
                'answer_2' => [
                    'label' => 'GET est utilisé pour envoyer des données au serveur,
                                POST pour récupérer des données du serveur',
                    'is_correct' => false,
                ],
                'answer_3' => [
                    'label' => 'GET place les données dans l\'URL, POST les place
                                dans le corps de la requête',
                    'is_correct' => true,
                ],
                'answer_4' => [
                    'label' => 'GET est plus sécurisé que POST pour les données sensibles',
                    'is_correct' => false,
                ],
            ],
            'question_7' => [
                'answer_1' => [
                    'label' => 'session_start(); $_SESSION[\'variable\'] = \'valeur\';',
                    'is_correct' => true,
                ],
                'answer_2' => [
                    'label' => 'start_session(); $session[\'variable\'] = \'valeur\';',
                    'is_correct' => false,
                ],
                'answer_3' => [
                    'label' => 'init_session(); $_SESSION[\'variable\'] = \'valeur\';',
                    'is_correct' => false,
                ],
                'answer_4' => [
                    'label' => 'new_session(); $session[\'variable\'] = \'valeur\';',
                    'is_correct' => false,
                ],
            ],
            'question_8' => [
                'answer_1' => [
                    'label' => 'C\'est une technique pour injecter du code malveillant
                                dans un script PHP',
                    'is_correct' => false,
                ],
                'answer_2' => [
                    'label' => 'C\'est un moyen de fournir des dépendances externes à
                                une classe plutôt que de les instancier à l\'intérieur de la classe',
                    'is_correct' => true,
                ],
                'answer_3' => [
                    'label' => 'C\'est une méthode qui injecte des données
                                dans une base de données sans passer par un formulaire',
                    'is_correct' => false,
                ],
                'answer_4' => [
                    'label' => 'C\'est une fonctionnalité de PHP pour injecter
                                automatiquement des variables dans une fonction',
                    'is_correct' => false,
                ],
            ],
            'question_9' => [
                'answer_1' => [
                    'label' => 'Un éditeur de texte populaire pour le développement PHP',
                    'is_correct' => false,
                ],
                'answer_2' => [
                    'label' => 'Un gestionnaire de dépendances pour PHP',
                    'is_correct' => true,
                ],
                'answer_3' => [
                    'label' => 'Une fonctionnalité pour composer des images en PHP',
                    'is_correct' => false,
                ],
                'answer_4' => [
                    'label' => 'Un serveur web spécialement conçu pour les applications PHP',
                    'is_correct' => false,
                ],
            ],
        ],
        'course_3' => [
            'question_1' => [
                'answer_1' => [
                    'label' => ' Il n\'y a pas de différence',
                    'is_correct' => false,
                ],
                'answer_2' => [
                    'label' => 'let est utilisé pour les variables globales,
                                var pour les variables locales, et const pour les constantes',
                    'is_correct' => false,
                ],
                'answer_3' => [
                    'label' => 'let a une portée de bloc, var a une portée de fonction,
                                et const est utilisé pour les variables immuables',
                    'is_correct' => true,
                ],
                'answer_4' => [
                    'label' => 'var est obsolète, utilisez toujours let et const',
                    'is_correct' => false,
                ],
            ],
            'question_2' => [
                'answer_1' => [
                    'label' => 'Il se déclenche lorsque la page a fini de se charger,
                                y compris les images et les scripts externes',
                    'is_correct' => true,
                ],
                'answer_2' => [
                    'label' => 'Il est déclenché lorsque le DOM
                                est construit, sans attendre les feuilles de style ou les images',
                    'is_correct' => false,
                ],
                'answer_3' => [
                    'label' => 'Il est déclenché lorsque l\'utilisateur clique sur un élément de la page',
                    'is_correct' => false,
                ],
                'answer_4' => [
                    'label' => 'Il est déclenché lorsqu\'une requête AJAX est terminée',
                    'is_correct' => false,
                ],
            ],
            'question_3' => [
                'answer_1' => [
                    'label' => 'function maFonction() => {}',
                    'is_correct' => false,
                ],
                'answer_2' => [
                    'label' => 'const maFonction = function() {}',
                    'is_correct' => false,
                ],
                'answer_3' => [
                    'label' => 'const maFonction = () => {}',
                    'is_correct' => true,
                ],
                'answer_4' => [
                    'label' => 'function maFonction() {}',
                    'is_correct' => false,
                ],
            ],
            'question_4' => [
                'answer_1' => [
                    'label' => 'getElement("exemple")',
                    'is_correct' => false,
                ],
                'answer_2' => [
                    'label' => 'document.find("#exemple")',
                    'is_correct' => false,
                ],
                'answer_3' => [
                    'label' => 'document.querySelector(".exemple")',
                    'is_correct' => false,
                ],
                'answer_4' => [
                    'label' => 'document.getElementById("exemple")',
                    'is_correct' => true,
                ],
            ],
            'question_5' => [
                'answer_1' => [
                    'label' => 'array.add()',
                    'is_correct' => false,
                ],
                'answer_2' => [
                    'label' => 'array.push()',
                    'is_correct' => true,
                ],
                'answer_3' => [
                    'label' => 'array.append()',
                    'is_correct' => false,
                ],
                'answer_4' => [
                    'label' => 'array.concat()',
                    'is_correct' => false,
                ],
            ],
            'question_6' => [
                'answer_1' => [
                    'label' => 'Utilisez les blocs try/catch',
                    'is_correct' => true,
                ],
                'answer_2' => [
                    'label' => 'Utilisez les fonctions setTimeout() et clearTimeout()',
                    'is_correct' => false,
                ],
                'answer_3' => [
                    'label' => 'Utilisez la méthode onError des objets Promise',
                    'is_correct' => false,
                ],
                'answer_4' => [
                    'label' => 'JavaScript ne gère pas les erreurs asynchrones',
                    'is_correct' => false,
                ],
            ],
            'question_7' => [
                'answer_1' => [
                    'label' => 'Il est déclenché lorsqu\'un bouton de la souris est enfoncé',
                    'is_correct' => false,
                ],
                'answer_2' => [
                    'label' => 'Il est déclenché lorsqu\'un élément devient le curseur actif',
                    'is_correct' => false,
                ],
                'answer_3' => [
                    'label' => 'Il est déclenché lorsqu\'une souris entre dans un élément',
                    'is_correct' => true,
                ],
                'answer_4' => [
                    'label' => 'Il est déclenché lorsqu\'un élément est cliqué',
                    'is_correct' => false,
                ],
            ],
            'question_8' => [
                'answer_1' => [
                    'label' => 'Ils sont interchangeables, et peuvent être utilisés l\'un pour l\'autre',
                    'is_correct' => false,
                ],
                'answer_2' => [
                    'label' => 'Null : valeur qui indique l\'absence de valeur. Undefined : valeur
                                par défaut des variables',
                    'is_correct' => true,
                ],
                'answer_3' => [
                    'label' => 'undefined : valeur qui indique l\'absence de valeur. Null : valeur par
                                défaut des variables',
                    'is_correct' => false,
                ],
                'answer_4' => [
                    'label' => 'Il n\'y a pas de différence entre null et undefined',
                    'is_correct' => false,
                ],
            ],
            'question_9' => [
                'answer_1' => [
                    'label' => '"bubbling" : propagation du parent aux enfants.
                    "capturing" : propagation des enfants vers le parent',
                    'is_correct' => false,
                ],
                'answer_2' => [
                    'label' => 'bubbling : propagation d\'un événement des enfants
                    au parent,. "capturing" : propagation du parent aux enfants',
                    'is_correct' => true,
                ],
                'answer_3' => [
                    'label' => 'Il n\'y a pas de différence entre le "bubbling" et le "capturing" en JS',
                    'is_correct' => false,
                ],
                'answer_4' => [
                    'label' => 'Ces concepts ne sont pas liés aux événements en JavaScript',
                    'is_correct' => false,
                ],
            ],
        ],
        'course_4' => [
            'question_1' => [
                'answer_1' => [
                    'label' => 'PHP',
                    'is_correct' => true,
                ],
                'answer_2' => [
                    'label' => 'JavaScript',
                    'is_correct' => true,
                ],
            ],
            'question_2' => [
                'answer_1' => [
                    'label' => 'PHP',
                    'is_correct' => true,
                ],
                'answer_2' => [
                    'label' => 'JavaScript',
                    'is_correct' => true,
                ],
                'answer_3' => [
                    'label' => 'Je ne sais pas',
                    'is_correct' => true,
                ],
            ],
            'question_3' => [
                'answer_1' => [
                    'label' => 'Front-end',
                    'is_correct' => true,
                ],
                'answer_2' => [
                    'label' => 'Back-end',
                    'is_correct' => true,
                ],
            ],
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::COURSES as $courseKey => $courseQuestions) {
            foreach ($courseQuestions as $questionKey => $questionAnswers) {
                foreach ($questionAnswers as $answerArray) {
                    $answer = new Answer();

                    $answer->setLabel($answerArray['label']);
                    $answer->setIsCorrect($answerArray['is_correct']);
                    $answer->setQuestion($this->getReference($courseKey . '_' . $questionKey));

                    $manager->persist($answer);
                }
            }
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            QuestionFixtures::class,
        ];
    }
}
