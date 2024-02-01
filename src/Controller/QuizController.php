<?php

namespace App\Controller;

use App\Repository\CourseRepository;
use App\Service\QuizService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
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
        if (!isset($_POST["pathInformation"])) {
            $course = $courseRepository->findOneById(self::FIRST_COURSE);
        } else {
            $course = $courseRepository->findOneById($_POST["pathInformation"]);
        }

        return $this->render('Quiz/quiz.html.twig', [
            'course' => $course,
        ]);
    }

    #[IsGranted('ROLE_USER')]
    #[Route('/rules', name: 'app_rules')]
    public function introQuiz(): Response
    {
        return $this->render('Quiz/rules.html.twig');
    }

    #[IsGranted('ROLE_USER')]
    #[Route('/generatePlaylist', name: 'app_generatePlaylist')]
    public function getPlaylistByQuiz(
        Request $request,
        CourseRepository $courseRepository,
        QuizService $quizService
    ): Response {
        $data = json_decode($request->getContent(), true);

        $scoreInPercent = $quizService->calculateScore($data);

        $courseId = $courseRepository->findOneByLabel($data['course'])->getId();

        $userId = $this->getUser()->getId();

        $responseData = [
            'courseId' => $courseId,
            'userId' => $userId,
            'scoreInPercent' => $scoreInPercent,
        ];

        return new JsonResponse($responseData);
    }
}
