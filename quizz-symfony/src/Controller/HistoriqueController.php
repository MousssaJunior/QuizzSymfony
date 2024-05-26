<?php

namespace App\Controller;

use App\Entity\Historique;
use App\Entity\Question;
use App\Entity\Reponse;
use App\Entity\Categorie;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use App\Repository\CategorieRepository;
use App\Repository\QuestionRepository;
use App\Repository\ReponseRepository;
use Symfony\Component\HttpFoundation\Request;

class HistoriqueController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/historique', name: 'user_historique')]
    public function historique(): Response
    {
        $user = $this->getUser();
        if (!$user instanceof UserInterface) {
            throw $this->createAccessDeniedException();
        }

        $userId = $user->getId();
        $history = $this->entityManager->getRepository(Historique::class)->findBy(
            ['id_user' => $userId],
            ['id' => 'DESC']
        );

        $historyData = [];
        foreach ($history as $entry) {
            /** @var Historique $entry */
            $questionId = $entry->getIdQuestion();
            $reponseId = $entry->getIdReponse();
            $categorieId = $entry->getIdCategorie();
            
          
            $question = $this->entityManager->getRepository(Question::class)->find($questionId);
            $reponse = $this->entityManager->getRepository(Reponse::class)->find($reponseId);
            $categorie = $this->entityManager->getRepository(Categorie::class)->find($categorieId);
            
       
            if ($question && $reponse && $categorie) {
                $historyData[] = [
                    'categorie' => $categorie->getname(), 
                    'question' => $question->getQuestion(),
                    'reponse' => $reponse->getReponse(),
                    'reponse_expected' => $reponse->getReponseExpected(), // Assurez-vous que cette méthode existe dans l'entité Reponse

                  
                ];
            }
        }

        return $this->render('historique/index.html.twig', [
            'user' => $user,
            'history' => $historyData,
        ]);
    }
}
