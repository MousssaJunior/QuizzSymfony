<?php 
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategorieRepository;
use App\Repository\QuestionRepository;
use App\Repository\ReponseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Historique;

class ReponseController extends AbstractController
{
    #[Route('/reponse_back/{id_categorie}', name: 'app_reponse')]
    public function GetResponses(
        Request $request,
        CategorieRepository $repositoryCategorie,
        QuestionRepository $repositoryQuestion,
        ReponseRepository $repositoryReponse,
        $id_categorie,
        EntityManagerInterface $entityManager
    ): RedirectResponse {
      
        $reponse = $request->get('question');

    
        
        $resultat = 0;

    
        $AllQuestions = $repositoryQuestion->countQuestions($id_categorie);

        $info_user = $this->getUser()->getId();

        $categorie = $repositoryCategorie->find($id_categorie);
        $name_categorie = $categorie->getName();

      
        foreach ($reponse as $key => $value) {
            $expected = $repositoryReponse->find($value);
            if ($expected && $expected->getReponseExpected() == 1) {
                $resultat++;
            }
    
   
            $histo = new Historique();
            $histo->setIdUser($info_user);
            $histo->setIdCategorie($id_categorie);
            $histo->setNameCategorie($name_categorie);
            $histo->setIdQuestion((int)$key);  
            $histo->setIdReponse((int)$value);  

       
            $entityManager->persist($histo);
        }


        $entityManager->flush();

 
        return $this->redirectToRoute('app_resultat', [
            'resultat' => $resultat,
            'AllQuestion' => $AllQuestions[0]['COUNT(id)']
        ]);
    }
}
