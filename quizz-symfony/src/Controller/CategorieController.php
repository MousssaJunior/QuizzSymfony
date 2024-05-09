<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\CategorieRepository;

class CategorieController extends AbstractController
{
    #[Route('/categorie', name: 'app_categorie')]
    public function index(CategorieRepository $repositoryCategorie): Response
    {
        $categories = $repositoryCategorie->findAll();
    
        return $this->render('home/index.html.twig', [
            'categories' => $categories,
        ]);
    }
    
}
