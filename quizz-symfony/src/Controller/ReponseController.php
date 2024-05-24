<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\CategorieRepository;
use App\Repository\QuestionRepository;
use App\Repository\ReponseRepository;
use App\Repository\HistoriqueRepository;
use App\Repository\UsersRepository;
use App\Entity\Historique;
use App\Entity\Users;
use App\Entity\Categorie;
use Symfony\Component\HttpFoundation\Request;




class ReponseController extends AbstractController
{
    #[Route('/reponse_back/{id_categorie}', name: 'app_reponse')]
    public function GetResponses(Request $request,  CategorieRepository $repositoryCategorie, QuestionRepository $repositoryQuestion, ReponseRepository $repositoryReponse, $id_categorie): RedirectResponse
    {   $reponse =  $request->get("question");

        $keys = array_keys($reponse);    
        $value = array_values($reponse);
        $expected = $repositoryReponse->findby(['id' => $value] );
        $resultat = 0;
        $AllQuestions = $repositoryQuestion->countQuestions($id_categorie);
        foreach($expected as $val){
            if($val->getReponseExpected() == 1){
               $resultat++;
            }
        } 
        // $id_user = getid();
         $user = new users;
        $info_user = $this->getUser()->getId();
        $categorie = $repositoryCategorie->findby(['id' => $id_categorie]);   
        $categorie = $repositoryQuestion->findby(['id_categorie' => $id_user]);   
        $name_categorie = $categorie[0]->getName();
        $histo = new historique();
         $histo->setIdUser($id_user);
         $histo->setIdCategorie($id_categorie);
         $histo->setNameCategorie($name_categorie);
         $histo->setIdQuestion($keys);
         $histo->setIdReponse($value);  
        

            return $this->redirectToRoute('app_resultat', ['resultat' => $resultat, 'AllQuestion' => $AllQuestions[0]['COUNT(id)']]);
    }

}
