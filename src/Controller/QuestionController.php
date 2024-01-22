<?php

namespace App\Controller;

use App\Entity\Answer;
use App\Entity\Question;
use App\Repository\AnswerRepository;
use App\Repository\QuestionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController extends AbstractController
{
    #[Route('/question/{id}', name: 'app_question')]
    public function index(int $id, QuestionRepository $questionRepository, AnswerRepository $answerRepository): Response
    {
        $question = $questionRepository->findOneBy(['id' => $id]);
        $answer = $answerRepository->findOneBy(['id' => $id]);

        // $answers = $answerRepository->findAll();
        $answers = $answerRepository->findbyQuestionId($question->getId(), $answer->getLabel());

        return $this->render('question/index.html.twig', [
            'controller_name' => 'QuestionController',
            'question' => $question,
            'answers' => $answers,

        ]);
    }
}
