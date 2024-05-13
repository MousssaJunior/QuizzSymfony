<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\NewQuizzRepository;

class NewQuizzController extends AbstractController
{
    #[Route('/new/quizz', name: 'app_new_quizz')]
    public function index(): Response
    {
        return $this->render('new_quizz/index.html.twig', [
            'controller_name' => 'NewQuizzController',
        ]);
    }
}
