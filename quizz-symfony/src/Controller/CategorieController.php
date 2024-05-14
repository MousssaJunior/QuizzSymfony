<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\CategorieRepository;
use App\Repository\QuestionRepository;
use App\Repository\ReponseRepository;

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
    
    #[Route('/categorie/{id}', name: 'app_quizz')]
    public function showQuizz($id, CategorieRepository $repositoryCategorie, QuestionRepository $repositoryQuestion, ReponseRepository $repositoryReponse): Response
    {
        $categorie = $repositoryCategorie->find($id);
        $questions = $repositoryQuestion->findBy(['id_categorie' => $categorie]);
        $reponses =  $repositoryReponse->findby(['id_question' => $questions]);
        // print_r($reponses);
        return $this->render('categorie/index.html.twig', [ 
            'categorie' => $categorie,
            'questions' => $questions,
            'reponses' => $reponses
        ]);
    }
    
}

      

