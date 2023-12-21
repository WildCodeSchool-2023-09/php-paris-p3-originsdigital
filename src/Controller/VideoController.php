<?php

namespace App\Controller;

use App\Entity\Video;
use App\Form\UploadVideoType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VideoController extends AbstractController
{
    #[Route('/video', name: 'app_video')]
    public function index(): Response
    {
        return $this->render('video/index.html.twig', [
            'controller_name' => 'VideoController',
        ]);
    }

    #[Route('/new', name: 'upload_video')]
    public function new(
        Request $request,
        EntityManagerInterface $entityManager
    ): Response {
        $video = new Video();
        $form = $this->createForm(UploadVideoType::class, $video);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($video);
            $entityManager->flush();
            return $this->redirectToRoute('upload_video');
        }

        return $this->render('video/add.html.twig', [
        'video' => $video,
        'form' => $form,
        ]);
    }
}
