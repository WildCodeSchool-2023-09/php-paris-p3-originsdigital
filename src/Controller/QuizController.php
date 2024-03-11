<?php

namespace App\Controller;

use App\Repository\CourseRepository;
use App\Repository\PlaylistRepository;
use App\Service\QuizService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class QuizController extends AbstractController
{
    private const FIRST_COURSE = 1;

    #[IsGranted('ROLE_PREMIUM')]
    #[Route('/quiz', name: 'app_quiz')]
    public function quiz(CourseRepository $courseRepository): Response
    {
        if (!isset($_POST["pathInformation"])) {
            $course = $courseRepository->findOneById(self::FIRST_COURSE);
        } else {
            $course = $courseRepository->findOneById($_POST["pathInformation"]);
        }

        return $this->render('quiz/quiz.html.twig', [
            'course' => $course,
        ]);
    }

    #[IsGranted('ROLE_PREMIUM')]
    #[Route('/rules', name: 'app_rules')]
    public function introQuiz(): Response
    {
        return $this->render('quiz/rules.html.twig');
    }

    #[IsGranted('ROLE_PREMIUM')]
    #[Route('/generatePlaylist', name: 'app_generatePlaylist')]
    public function getPlaylistByQuiz(
        Request $request,
        CourseRepository $courseRepository,
        PlaylistRepository $playlistRepository,
        QuizService $quizService
    ): Response {
        $data = json_decode($request->getContent(), true);

        $score = $quizService->calculateScore($data['result']);
        $course = $courseRepository->findOneByLabel($data['course']);

        $playlistRepository->assignPlaylist($this->getUser(), $course, $score);

        return $this->json([$score]);
    }

    #[IsGranted('ROLE_PREMIUM')]
    #[Route('/result', name: 'app_result')]
    public function resultQuiz(Request $request): Response
    {
        $score = $request->query->get('score');

        return $this->render('quiz/result.html.twig', [
            'score' => $score,
        ]);
    }
}
