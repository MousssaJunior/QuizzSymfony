<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\CategorieRepository;
use App\Repository\QuestionRepository;
use App\Repository\ReponseRepository;

class ReponseController extends AbstractController
{
    #[Route('/reponse', name: 'app_reponse')]
    public function index(): Response
    {
        return $this->render('reponse/index.html.twig', [
            'controller_name' => 'ReponseController',
        ]);
    }

    #[Route('/categorie/{id}', name: 'check_reponse')]
    public function checkQuizz($id, CategorieRepository $repositoryCategorie, QuestionRepository $repositoryQuestion, ReponseRepository $repositoryReponse): Response
    {  
        $categorie = $repositoryCategorie->find($id);
        $questions = $repositoryQuestion->findBy(['id_categorie' => $categorie]);
        $reponses =  $repositoryReponse->findBy(['id_question' => $questions]);
        $true = $repositoryReponse->findby(['reponse_expected', $reponses]);
        
        return $this->render('categorie/index.html.twig', [ 
          
            'categorie' => $categorie,
            'questions' => $questions,
            'reponses' => $reponses,
            'vrai' => $vrai
            // dd($reponses),
        ]);
             
    }


}
