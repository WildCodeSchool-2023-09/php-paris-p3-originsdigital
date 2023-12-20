<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/category', name: 'category_')]
class CategoryController extends AbstractController
{
    #[Route('/{label}', name: 'index')]
    public function indexForPhp(CategoryRepository $categoryRepository): Response
    {
        $categories = $categoryRepository->findByLanguage('');

        return $this->render('language/category/index.html.twig', [
            'categories' => $categories,
        ]);
    }
}
