<?php

namespace App\DataFixtures;

use App\Entity\Answer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AnswerFixtures extends Fixture implements DependentFixtureInterface
{
    public const ANSWERS = [
        'Reponse 1' => [
            'questionNumber' => '1',
            'label' => 'Je veux entamer une reconversion professionnelle',
            'is_correct' => true,
        ],
        'Reponse 2' => [
            'questionNumber' => '1',
            'label' => 'Je veux apprendre pour un projet personnel',
            'is_correct' => true,
        ],
        'Reponse 3' => [
            'questionNumber' => '2',
            'label' => 'Je me consacre à la formation à plein temps',
            'is_correct' => false,
        ],
        'Reponse 4' => [
            'questionNumber' => '2',
            'label' => 'Je peux travailler quelques heures par jour',
            'is_correct' => false,
        ],
        'Reponse 5' => [
            'questionNumber' => '2',
            'label' => 'Je peux travailler quelques heures par semaine',
            'is_correct' => true,
        ],
        'Reponse 6' => [
            'questionNumber' => '3',
            'label' => 'Je n\'ai jamais codé',
            'is_correct' => true,
        ],
        'Reponse 7' => [
            'questionNumber' => '3',
            'label' => 'J\'ai les notions fondamentales basiques',
            'is_correct' => true,
        ],
        'Reponse 8' => [
            'questionNumber' => '3',
            'label' => 'J\'ai déjà suivi des cours dans un langage et je souhaite me perfectionner dans celui-ci',
            'is_correct' => true,
        ],
        'Reponse 9' => [
            'questionNumber' => '3',
            'label' => 'Je maîtrise un langage et je souhaite en apprendre un nouveau',
            'is_correct' => true,
        ],
        'Reponse 10' => [
            'questionNumber' => '4',
            'label' => 'PHP',
            'is_correct' => true,
        ],
        'Reponse 11' => [
            'questionNumber' => '4',
            'label' => 'JS',
            'is_correct' => true,
        ],
    ];
    public function load(ObjectManager $manager): void
    {
        foreach (self::ANSWERS as $answerDetails) {
            $answer = new Answer();
            $answer->setQuestion($this->getReference('question_' . $answerDetails['questionNumber']));
            $answer->setLabel($answerDetails['label']);
            $answer->setIsCorrect($answerDetails['is_correct']);

            $manager->persist($answer);
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
