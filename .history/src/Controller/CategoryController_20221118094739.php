<?php
// src/Controller/CategoryController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
// Managing ERRORS EXCEPTION/
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Repository\CategoryRepository;
use App\Repository\ProgramRepository;

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
    public function show(
        string $name,string $category-id, CategoryRepository $categoryRepository,
        ProgramRepository $programRepository
        ): Response
    {
        $category = $categoryRepository->findOneBy(['name'=> $name]);
        $programs = $programRepository->findByCategory(['category-id' => $category-id]);
        if(!$category) {
            throw $this->createNotFoundException(':( The category does not exist dude');
        }
        return $this->render('category/show.html.twig', [
            'category' => $category,
            'programs' =>$programs,
        ]);
    }
}