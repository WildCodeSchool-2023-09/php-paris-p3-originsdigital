<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(): Response
    {

        if ($this->getUser() !== null) {
            return $this->redirectToRoute('language_index');
        }

        return $this->render('home/index.html.twig');
    }
}
