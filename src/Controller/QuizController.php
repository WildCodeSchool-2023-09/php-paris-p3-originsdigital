<?php

namespace App\Controller;

use App\Repository\CourseRepository;
use App\Repository\QuestionRepository;
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
    #[Route('/score', name: 'app_score')]
    public function getPlaylist(Request $request, QuestionRepository $questionRepository): Response
    {
        $data = json_decode($request->getContent(), true);

        $score = 0;
        $totalQuestions = 0;
        $question = null;

        foreach ($data as $questionId => $answerId) {
            $question = $questionRepository->find($questionId);
            if ($question && $question->getCourse()) {
                $totalQuestions++;
                foreach ($question->getAnswers() as $answer) {
                    if ($answer->getId() == $answerId && $answer->isIsCorrect()) {
                        $score += 1;
                    }
                }
            }
        }

        $scoreInPercent = ($totalQuestions > 0) ? ($score / $totalQuestions) * 100 : 0;
        $course = $questionRepository->findByCourse($question->getCourse());
        $userId = $this->getUser()->getId();

        $responseData = [
            'course' => $course,
            'userId' => $userId,
            'scoreInPercent' => $scoreInPercent,
        ];

        return new JsonResponse($responseData);
        // appelle la fonction de zinedine pour générrer la playlist
        // retourne la playlist suivant les données
        // la playlist je la retourne dans la fin de la fonction que je peux remettre dans le then du fetch

        // return $this->redirectToRoute('assign_playlist', [
        //     'userId' => $userId,
        //     'course' => $course,
        //     'percentage' => $scoreInPercent,
        // ]);
    }
}
