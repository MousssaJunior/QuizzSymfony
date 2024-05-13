<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\QuestionRepository;
class QuestionController extends AbstractController
{
    #[Route('/question', name: 'app_question')]
    public function showQuestion(QuestionRepository $questionRepo): Response
    {
        $question = $questionRepo->findAll();
    
        return $this->render('question/index.html.twig', [
            'question' => $question,
        ]);
    }
}
