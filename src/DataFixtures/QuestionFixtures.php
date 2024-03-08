<?php

namespace App\DataFixtures;

use App\Entity\Question;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class QuestionFixtures extends Fixture implements DependentFixtureInterface
{
    public const COURSES = [
        'course_0' => [
            'question_1' => [
                'label' => 'Pourquoi souhaitez-vous apprendre le développement web ?',
                'questionNumber' => 1,
            ],
            'question_2' => [
                'label' => 'Combien de temps souhaitez-vous investir dans votre formation ?',
                'questionNumber' => 2,
            ],
            'question_3' => [
                'label' => 'Quel est votre niveau actuel en développement ?',
                'questionNumber' => 3,
            ],
            'question_4' => [
                'label' => 'De quel langage s\'agissait-il ?',
                'questionNumber' => 4,
            ],
        ],
        'course_1' => [
            'question_1' => [
                'label' => 'Évaluons un peu votre niveau ! 
                            Quel est le rôle de la balise <head> dans un document HTML ?',
                'questionNumber' => 1,
            ],
            'question_2' => [
                'label' => 'Comment insérer une image dans une page HTML ?',
                'questionNumber' => 2,
            ],
            'question_3' => [
                'label' => 'Comment centrer horizontalement un élément en CSS ?',
                'questionNumber' => 3,
            ],
            'question_4' => [
                'label' => 'Quelle est la différence entre margin et padding en CSS ?',
                'questionNumber' => 4,
            ],
            'question_5' => [
                'label' => 'Quelle est la différence entre == et === ?',
                'questionNumber' => 5,
            ],
            'question_6' => [
                'label' => 'Qu\'est-ce qu\'un framework ?',
                'questionNumber' => 6,
            ],
            'question_7' => [
                'label' => 'Quelle est la fonction principale d\'une base de données relationnelle ?',
                'questionNumber' => 7,
            ],
            'question_8' => [
                'label' => 'Avez-vous un esprit créatif ou logique ?',
                'questionNumber' => 8,
            ],
        ],
        'course_2' => [
            'question_1' => [
                'label' => 'Comment commentez-vous une seule ligne de code en PHP ?',
                'questionNumber' => 1,
            ],
            'question_2' => [
                'label' => 'Quelle fonction est utilisée pour afficher du texte dans PHP ?',
                'questionNumber' => 2,
            ],
            'question_3' => [
                'label' => ' Comment déclarez-vous une variable en PHP ?',
                'questionNumber' => 3,
            ],
            'question_4' => [
                'label' => 'Comment inclure le contenu d\'un fichier dans un script PHP ?',
                'questionNumber' => 4,
            ],
            'question_5' => [
                'label' => 'Comment sécurisez-vous votre code PHP contre les attaques par injection SQL ?',
                'questionNumber' => 5,
            ],
            'question_6' => [
                'label' => 'Quelle est la différence entre les méthodes GET et POST en PHP ?',
                'questionNumber' => 6,
            ],
            'question_7' => [
                'label' => 'Comment utilisez-vous la session en PHP pour stocker 
                            des variables d\'une page à l\'autre ?',
                'questionNumber' => 7,
            ],
            'question_8' => [
                'label' => 'Qu\'est-ce que l\'injection de dépendances (Dependency Injection) en PHP ?',
                'questionNumber' => 8,
            ],
            'question_9' => [
                'label' => 'Qu\'est-ce que Composer en PHP ?',
                'questionNumber' => 9,
            ],
        ],
        'course_3' => [
            'question_1' => [
                'label' => 'Quelle est la différence entre let, var, et const 
                            en JavaScript pour déclarer des variables ?',
                'questionNumber' => 1,
            ],
            'question_2' => [
                'label' => 'Qu\'est-ce que l\'événement "DOMContentLoaded" en JavaScript ?',
                'questionNumber' => 2,
            ],
            'question_3' => [
                'label' => 'Comment définissez-vous une fonction fléchée en JavaScript ?',
                'questionNumber' => 3,
            ],
            'question_4' => [
                'label' => 'Comment accédez-vous à un élément HTML avec l\'ID "exemple" en JavaScript ?',
                'questionNumber' => 4,
            ],
            'question_5' => [
                'label' => 'Quelle méthode JavaScript est utilisée pour ajouter un élément à la fin d\'un tableau ?',
                'questionNumber' => 5,
            ],
            'question_6' => [
                'label' => 'Comment gérer les erreurs asynchrones en JavaScript ?',
                'questionNumber' => 6,
            ],
            'question_7' => [
                'label' => 'Qu\'est-ce que l\'événement "mouseenter" en JavaScript ?',
                'questionNumber' => 7,
            ],
            'question_8' => [
                'label' => 'Quelle est la différence entre null et undefined en JavaScript ?',
                'questionNumber' => 8,
            ],
            'question_9' => [
                'label' => 'Qu\'est-ce que le concept d\'événements bubbling et capturing en JavaScript ?',
                'questionNumber' => 9,
            ],
        ],
        'course_4' => [
            'question_1' => [
                'label' => 'Quel langage maîtrisez-vous ?',
                'questionNumber' => 1,
            ],
            'question_2' => [
                'label' => 'Quel langage souhaitez-vous apprendre ?',
                'questionNumber' => 2,
            ],
            'question_3' => [
                'label' => 'Que recherchez-vous à travers l\'apprentissage de ce second langage ?',
                'questionNumber' => 3,
            ],
        ],
    ];


    public function load(ObjectManager $manager): void
    {
        foreach (self::COURSES as $courseKey => $course) {
            foreach ($course as $questionKey => $questionDetails) {
                $question = new Question();
                $question->setLabel($questionDetails['label']);
                $question->setQuestionNumber($questionDetails['questionNumber']);
                $question->setCourse($this->getReference($courseKey));

                $this->setReference($courseKey . '_' . $questionKey, $question);

                $manager->persist($question);
            }
            $manager->flush();
        }
    }

    public function getDependencies()
    {
        return [
            CourseFixtures::class,
        ];
    }
}
