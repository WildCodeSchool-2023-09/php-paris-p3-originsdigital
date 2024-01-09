<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\LanguageRepository;
use App\Repository\VideoRepository;
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
        VideoRepository $videoRepository,
        LanguageRepository $languageRepository
    ): Response {
        $language = $languageRepository->findBy(['slug' => $slug]);
        $categories = $categoryRepository->findByLanguage($language);
        $videos = [];
        foreach($categories as $category){
            $videos[$category->getLabel()] = $videoRepository->findByCategory($category, null, 9);
        }

        return $this->render('category/index.html.twig', [
            'categories' => $categories,
            'slug' => $slug,
            'videos' => $videos,
        ]);
    }

}
