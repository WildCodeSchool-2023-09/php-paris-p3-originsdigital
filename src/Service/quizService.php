<?php

namespace App\Service;

use App\Repository\QuestionRepository;

class QuizService
{
    private QuestionRepository $questionRepository;

    public function __construct(QuestionRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    public function calculateScore(array $answers): int
    {
        $score = 0;
        $totalQuestions = 0;

        foreach ($answers as $questionId => $answerId) {
            $question = $this->questionRepository->findOneById($questionId);
            if ($question && $question->getCourse()) {
                $totalQuestions++;
                foreach ($question->getAnswers() as $answer) {
                    if ($answer->getId() == $answerId && $answer->isIsCorrect()) {
                        $score += 1;
                    }
                }
            }
        }
        return ($score / $totalQuestions) * 100;
    }
}
