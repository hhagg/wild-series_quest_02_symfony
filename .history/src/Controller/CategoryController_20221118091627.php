<?php
// src/Controller/CategoryController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategoryRepository;

#[Route('/category', name: 'category_')]
class CategoryController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        $categories = $categoryRepository->findAll();
        return $this->render('category/index.html.twig', [
            'categories' => $categories,
        ]);
    }

    #[Route('/{name}',methods: ['GET'], name: 'show')]
    public function show(string $name,CategoryRepository $categoryRepository): Response
    {
        $category = $categoryRepository->findOneBy(['name'=> $name]);
        return $this->render('category/show.html.twig', [
            'category' => $category,
            'programs' =>$programs,
        ]);
    }
}