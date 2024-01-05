<?php

namespace App\Controller;

use App\Entity\Video;
use App\Form\UploadVideoType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/video', name: 'video_')]
class VideoController extends AbstractController
{
    #[Route('/new', name: 'new')]
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

            return $this->redirectToRoute('video_new');
        }

        return $this->render('video/add.html.twig', [
            'form' => $form,
        ]);
    }
}
