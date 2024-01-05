<?php

namespace App\Controller;

use App\Entity\Video;
use App\Form\UploadVideoType;
use App\Repository\VideoRepository;
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

    #[Route('/show/{slug}', name: 'show')]
    public function index(string $slug, VideoRepository $videoRepository): Response
    {
        $video = $videoRepository->findOneBy(['slug' => $slug]);
        $categoryVideos = $videoRepository->findByCategory($video->getCategory());
        $recommandedVideos = [];
        foreach ($categoryVideos as $key => $categoryVideo) {
            if ($categoryVideo->getId() === $video->getId()) {
                for ($i = 1; $i <= 4; $i++) {
                    if (isset($categoryVideos[$key + $i])) {
                        $recommandedVideos[] = $categoryVideos[$key + $i];
                    }
                }
            }
        }
        if (!$video) {
            throw $this->createNotFoundException(
                'No video with id : ' . $slug . ' found in video\'s table.'
            );
        }
        return $this->render('video/index.html.twig', [
            'video' => $video,
            'recommandedVideos' => $recommandedVideos,
        ]);
    }
}
