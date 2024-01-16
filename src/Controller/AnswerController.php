<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnswerController extends AbstractController
{
    #[Route('/answer', name: 'app_answer')]
    public function index(): Response
    {
        return $this->render('answer/index.html.twig', [
            'controller_name' => 'AnswerController',
        ]);
    }
}
