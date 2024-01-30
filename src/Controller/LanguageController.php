<?php

namespace App\Controller;

use App\Entity\Video;
use App\Repository\VideoRepository;
use App\Repository\LanguageRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/language', name: 'language_')]
class LanguageController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(LanguageRepository $languageRepository): Response
    {
        return $this->render('language/index.html.twig', [
            'languages' => $languageRepository->findAll(),
        ]);
    }

    #[Route('/{slug}', name: 'category_index')]
    public function listCategoryByLanguage(
        string $slug,
        VideoRepository $videoRepository,
        LanguageRepository $languageRepository
    ): Response {
        $language = $languageRepository->findOneBySlug($slug);
        $videos = $videoRepository->findByLanguage($language);

        return $this->render('category/index.html.twig', [
            'categories' => Video::CATEGORIES,
            'videos' => $videos,
            'language' => $language,
        ]);
    }
}
