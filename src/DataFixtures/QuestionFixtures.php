<?php

namespace App\DataFixtures;

use App\Entity\Question;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class QuestionFixtures extends Fixture
{
    public const QUESTIONS = [
        '1' => [
            'label' => 'Pourquoi souhaitez-vous apprendre le développement web ?',
            'questionNumber' => 1,
        ],
        '2' => [
            'label' => 'Combien de temps souhaitez-vous investir dans votre formation ?',
            'questionNumber' => 2,
        ],
        '3' => [
            'label' => 'Quel est votre niveau actuel en développement ?',
            'questionNumber' => 3,
        ],
        '4' => [
            'label' => ' De quel langage s\'agissait-il ?',
            'questionNumber' => 4,
        ],
    ];
    public function load(ObjectManager $manager): void
    {
        foreach (self::QUESTIONS as $questions => $questionDetails) {
            $question = new Question();
            $question->setLabel($questionDetails['label']);
            $question->setQuestionNumber($questionDetails['questionNumber']);
            $this->setReference('question_' . $questions, $question);

            $manager->persist($question);
        }
        $manager->flush();
    }
}
