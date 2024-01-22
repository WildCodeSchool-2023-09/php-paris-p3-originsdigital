<?php

namespace App\Controller;

use App\Entity\Question;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController extends AbstractController
{
    #[Route('/quiz/{id}', name: 'app_quiz')]
    public function quiz(Question $question): Response
    {
        return $this->render('Quiz/quiz.html.twig', [
            'question' => $question,
        ]);
    }
}
