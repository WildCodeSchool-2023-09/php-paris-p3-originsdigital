<?php

namespace App\Controller;

use App\Repository\LanguageRepository;
use App\Repository\VideoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
        $language = $languageRepository->findBySlug($slug);
        $results = $videoRepository->findByLanguage($language);

        $videos = [];

        foreach ($results as $result) {
            $videos[$result->getCategory()][] = $result;
        }

        return $this->render('category/index.html.twig', [
            'videos' => $videos,
            'slug' => $slug,
        ]);
    }
}
