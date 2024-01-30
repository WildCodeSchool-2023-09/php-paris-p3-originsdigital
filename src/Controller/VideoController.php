<?php

namespace App\Controller;

use App\Repository\VideoRepository;
use App\Entity\Video;
use App\Form\UploadVideoType;
use App\Repository\LanguageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/video', name: 'video_')]
class VideoController extends AbstractController
{
    #[Route('/new', name: 'new')]
    public function new(
        Request $request,
        EntityManagerInterface $entityManager,
        SluggerInterface $slugger
    ): Response {
        $video = new Video();
        $form = $this->createForm(UploadVideoType::class, $video);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $video->setSlug($slugger->slug($video->getTitle()));
            $entityManager->persist($video);
            $entityManager->flush();

            return $this->redirectToRoute('video_show', [
                'languageSlug' => $video->getLanguage()->getSlug(),
                'videoSlug' => $video->getSlug()
            ]);
        }

        return $this->render('video/add.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/show/{languageSlug}/{videoSlug}', name: 'show')]
    public function show(
        string $languageSlug,
        string $videoSlug,
        LanguageRepository $languageRepository,
        VideoRepository $videoRepository,
    ): Response {
        $language = $languageRepository->findOneBy(['slug' => $languageSlug]);
        $video = $videoRepository->findOneBy(['slug' => $videoSlug, 'language' => $language]);

        $recommandedVideos = $videoRepository->recommandedVideos(
            $video->getId(),
            $video->getCategory(),
            $video->getLanguage()->getLabel()
        );

        if (!$video) {
            throw $this->createNotFoundException(
                'No video with name : ' . $videoSlug . ' found in video\'s table.'
            );
        }

        return $this->render('video/player.html.twig', [
            'video' => $video,
            'recommandedVideos' => $recommandedVideos,
        ]);
    }

    #[Route('/{languageSlug}/{categoryLabel}', name: 'show_by_category')]
    public function listByCategory(
        string $languageSlug,
        string $categoryLabel,
        VideoRepository $videoRepository,
        PaginatorInterface $paginator,
        Request $request
    ): Response {
        $videos = $videoRepository->findBy(['category' => $categoryLabel]);
        $videos = $paginator->paginate(
            $videos,
            $request->query->getInt('page', 1),
            3,
        );
        return $this->render('video/index.html.twig', [
                'videos' => $videos,
                'categoryLabel' => $categoryLabel,
                'languageSlug' => $languageSlug,
            ]);
    }
}
