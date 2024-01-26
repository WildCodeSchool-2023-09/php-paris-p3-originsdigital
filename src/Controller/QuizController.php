<?php

namespace App\Controller;

use App\Entity\Course;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class QuizController extends AbstractController
{
    #[IsGranted('ROLE_USER')]
    #[Route('/quiz/{id}', name: 'app_quiz')]
    public function quiz(Course $course, Request $request): Response
    {
        if ($request->isMethod('POST')) {
            // $userAnswers = $request->request->get('pathInformation');

            return $this->redirectToRoute('app_quiz');
        }
        return $this->render('Quiz/quiz.html.twig', [
            'course' => $course,
        ]);
    }
}
