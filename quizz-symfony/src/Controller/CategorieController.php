<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\CategorieRepository;
use App\Repository\QuestionRepository;

class CategorieController extends AbstractController
{
    #[Route('/', name: 'app_categorie')]
    public function showCategorie(CategorieRepository $repositoryCategorie , QuestionRepository $repositoryQuestion): Response
    {
        $categories = $repositoryCategorie->findAll();
    
        return $this->render('home/index.html.twig', [
            'categories' => $categories,
        ]);

    }
      
}
