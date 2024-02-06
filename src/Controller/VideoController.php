<?php

namespace App\Controller;

use App\Entity\Video;
use App\Form\UploadVideoType;
use App\Repository\VideoRepository;
use App\Repository\LanguageRepository;
use App\Repository\PlaylistRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/video', name: 'video_')]
class VideoController extends AbstractController
{
    #[IsGranted('ROLE_ADMIN', message: 'Seuls les administrateurs peuvent ajouter des vidéos')]
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
            $this->addFlash('notice', 'Vidéo ajoutée avec succès');
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
        PlaylistRepository $playlistRepository,
        LanguageRepository $languageRepository,
        VideoRepository $videoRepository,
    ): Response {

        $language = $languageRepository->findOneBy(['slug' => $languageSlug]);

        $video = $videoRepository->findOneBy(['slug' => $videoSlug, 'language' => $language]);

        $playlistsIncVideo = $playlistRepository->playlistsIncVideo($video->getId(), $this->getUser()->getId());

        $playlistsExcVideo = $playlistRepository->playlistsExcVideo($video->getId(), $this->getUser()->getId());

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
            'playlistsIncVideo' => $playlistsIncVideo,
            'playlistsExcVideo' => $playlistsExcVideo,
        ]);
    }

    #[Route('/{languageSlug}/{categoryLabel}', name: 'show_by_category')]
    public function listByCategory(
        string $languageSlug,
        string $categoryLabel,
        VideoRepository $videoRepository,
        LanguageRepository $languageRepository,
        PaginatorInterface $paginator,
        Request $request
    ): Response {
        $languageLabel = $languageRepository->findBySlug($languageSlug);

        $videos = $videoRepository->findBy(['category' => $categoryLabel, 'language' => $languageLabel]);
        $videos = $paginator->paginate(
            $videos,
            $request->query->getInt('page', 1),
            9,
        );
        return $this->render('video/index.html.twig', [
                'videos' => $videos,
                'categoryLabel' => $categoryLabel,
                'languageSlug' => $languageSlug,
            ]);
    }
}
