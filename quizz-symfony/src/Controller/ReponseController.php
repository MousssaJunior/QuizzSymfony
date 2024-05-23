<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\CategorieRepository;
use App\Repository\QuestionRepository;
use App\Repository\ReponseRepository;
use Symfony\Component\HttpFoundation\Request;



class ReponseController extends AbstractController
{
    #[Route('/reponse_back/{id_categorie}', name: 'app_reponse')]
    public function GetResponses(Request $request,  CategorieRepository $repositoryCategorie, QuestionRepository $repositoryQuestion, ReponseRepository $repositoryReponse, $id_categorie): RedirectResponse
    {   $reponse =  $request->get("question");
        $value = array_values($reponse);
        
        $expected = $repositoryReponse->findby(['id' => $value] );
        $resultat = 0;

        $AllQuestions = $repositoryQuestion->countQuestions($id_categorie);
        foreach($expected as $val){
            if($val->getReponseExpected() == 1){
               $resultat++;
            }
        }
        return $this->redirectToRoute('app_resultat', ['resultat' => $resultat, 'AllQuestion' => $AllQuestions[0]['COUNT(id)']]);
    }

}
