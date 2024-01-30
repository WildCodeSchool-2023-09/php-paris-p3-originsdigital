<?php

namespace App\Controller;

use App\Repository\CourseRepository;
use App\Repository\QuestionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
        if (isset($_POST['tokenQuiz'])) {
            $score = $_POST['tokenQuiz'];
            // when zinedine create his method for the programs => change the route
            return $this->redirectToRoute("home", ['score' => $score]);
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

        // Etape 1 : QuizService qui calcule le score selon des réponses

        // Etape 2 : Appeler la fonction de Zinédine qui retrouve une playlist grâce à un score, un parcours et un user

        // Etape 3 : Renvoyer vers la vue de la playlist concernée

        $score = 0;

        foreach ($data as $questionId => $answerId) {
            $question = $questionRepository->find($questionId);
            foreach ($question->getAnswers() as $answer) {
                if ($answer->getId() == $answerId && $answer->isIsCorrect()) {
                    $score += 1;
                }
            }
        }

        return $this->json(['message' => 'Success', 'score' => $score]);
    }
}
