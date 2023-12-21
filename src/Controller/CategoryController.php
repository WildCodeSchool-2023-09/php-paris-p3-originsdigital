<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\LanguageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/category', name: 'category_')]
class CategoryController extends AbstractController
{
    #[Route('/{slug}', name: 'index')]
    public function index(
        string $slug,
        CategoryRepository $categoryRepository,
        LanguageRepository $languageRepository
    ): Response {

        $language = $languageRepository->findBy(['slug' => $slug]);
        $categories = $categoryRepository->findByLanguage($language);

        return $this->render('language/category/index.html.twig', [
            'categories' => $categories,
            'slug' => $slug,
        ]);
    }

    #[Route('/{slug}/{categoryLabel}', name: 'show_all')]
    public function showAllVideosForOneCategory(
        string $slug,
        string $categoryLabel,
        VideoRepository $videoRepository,
    ): Response {

        $videos = $videoRepository->findByCategory($categoryLabel);

        return $this->render('language/category/index.html.twig', [
            'videos' => $videos,
        ]);
    }
}
