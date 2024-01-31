<?php

namespace App\Controller;

use App\Entity\Playlist;
use App\Form\PlaylistType;
use App\Repository\PlaylistRepository;
use App\Repository\VideoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/playlist', name:'playlist_')]
class PlaylistController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(PlaylistRepository $playlistRepository): Response
    {
        return $this->render('playlist/index.html.twig', [
            'playlists' => $playlistRepository->findBy(['createdBy' => $this->getUser()]),
        ]);
    }

    #[Route('/new/{videoId}', name: 'new', methods: ['GET', 'POST'])]
    public function new(
        Request $request,
        VideoRepository $videoRepository,
        EntityManagerInterface $entityManager,
        int $videoId = null
    ): Response {
        $playlist = new Playlist();
        $form = $this->createForm(PlaylistType::class, $playlist);
        $form->handleRequest($request);

        $video = $videoRepository->findOneById($videoId);

        if ($form->isSubmitted() && $form->isValid()) {
            $playlist->setCreatedBy($this->getUser());
            if ($video) {
                $playlist->addVideo($video);
            }
            $entityManager->persist($playlist);
            $entityManager->flush();

            if ($video) {
                return $this->redirectToRoute('video_show', [
                    'languageSlug' => $video->getLanguage()->getSlug(),
                    'videoSlug' => $video->getSlug()
                ]);
            } else {
                return $this->redirectToRoute('playlist_index', [], Response::HTTP_SEE_OTHER);
            }
        }

        return $this->render('playlist/new.html.twig', [
            'playlist' => $playlist,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(Playlist $playlist): Response
    {
        return $this->render('playlist/show.html.twig', [
            'playlist' => $playlist,
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Playlist $playlist, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PlaylistType::class, $playlist);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('playlist_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('playlist/edit.html.twig', [
            'playlist' => $playlist,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, Playlist $playlist, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $playlist->getId(), $request->request->get('_token'))) {
            $entityManager->remove($playlist);
            $entityManager->flush();
        }

        return $this->redirectToRoute('playlist_index', [], Response::HTTP_SEE_OTHER);
    }
}
