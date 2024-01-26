<?php

namespace App\Controller;

use App\Entity\Course;
use App\Repository\CourseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class QuizController extends AbstractController
{
    #[IsGranted('ROLE_USER')]
    #[Route('/quiz', name: 'app_quiz')]
    public function firstQuiz(): Response
    {
        return $this->render('quiz/quiz.html.twig');
    }

    #[IsGranted('ROLE_USER')]
    #[Route('/quiz/{id}', name: 'app_quiz')]
    public function quiz(int $id, Course $course, CourseRepository $courseRepository): Response
    {
        $course = $courseRepository->findOneById(['id' => $id]);
        return $this->render('Quiz/quiz.html.twig', [
            'course' => $course,
        ]);
    }
}
