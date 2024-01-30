<?php

namespace App\Controller;

use App\Entity\Video;
use App\Form\UploadVideoType;
use App\Repository\VideoRepository;
use App\Repository\CategoryRepository;
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

            return $this->redirectToRoute('video_new');
        }

        return $this->render('video/add.html.twig', [
            'form' => $form,
        ]);
    }

    #[IsGranted('ROLE_USER', message: 'veuillez vous connecter pour regarder les vidéos')]
    #[Route('/show/{slug}', name: 'show')]
    public function show(
        string $slug,
        VideoRepository $videoRepository,
    ): Response {

        $video = $videoRepository->findOneBy(['slug' => $slug]);
        $recommandedVideos = $videoRepository->recommandedVideos($video->getId(), $video->getCategory()->getLabel());

        if (!$video) {
            throw $this->createNotFoundException(
                'No video with name : ' . $slug . ' found in video\'s table.'
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
        CategoryRepository $categoryRepository,
        VideoRepository $videoRepository,
        PaginatorInterface $paginator,
        Request $request
    ): Response {

        $category = $categoryRepository->findByLabel($categoryLabel);
        $videos = $videoRepository->findByCategory($category);
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
