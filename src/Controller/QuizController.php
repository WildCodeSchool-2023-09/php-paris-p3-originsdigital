<?php

namespace App\Controller;

use App\Repository\CourseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class QuizController extends AbstractController
{
    private const FIRST_COURSE = 1;

    #[IsGranted('ROLE_USER')]
    #[Route('/quiz', name: 'app_quiz')]
    public function quiz(CourseRepository $courseRepository): Response
    {
        if (isset($_POST['tokenQuiz'])) {
            // get user
            // get score
            // get course
            // les donner en dur à l entité persist et flush et nik tamer
            return $this->redirectToRoute("home");
        }

        if (!isset($_POST["pathInformation"])) {
            $course = $courseRepository->findOneById(self::FIRST_COURSE);
        } else {
            $course = $courseRepository->findOneById($_POST["pathInformation"]);
        }

        return $this->render('Quiz/quiz.html.twig', [
            'course' => $course,
        ]);
    }
}
