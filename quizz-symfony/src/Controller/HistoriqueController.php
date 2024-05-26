<?php

// src/Controller/UserProfileController.php

// src/Controller/HistoriqueController.php

// src/Controller/HistoriqueController.php

// src/Controller/HistoriqueController.php

// src/Controller/HistoriqueController.php

namespace App\Controller;

use App\Entity\Historique;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

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

        return $this->render('historique/index.html.twig', [
            'user' => $user,
            'history' => $history,
        ]);
    }
}

