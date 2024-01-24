<?php

namespace App\Controller;

use App\Entity\Course;
use App\Entity\Question;
use App\Repository\CourseRepository;
use App\Repository\QuestionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuizController extends AbstractController
{
    #[Route('/quiz/{id}', name: 'app_quiz')]
    public function quiz(Course $course): Response
    {
        return $this->render('Quiz/quiz.html.twig', [
            'course' => $course,
        ]);
    }
}
