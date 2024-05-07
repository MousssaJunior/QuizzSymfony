<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MenuquizzController extends AbstractController
{
    #[Route('/menuquizz', name: 'app_menuquizz')]
    public function menu(): Response
    {
        return $this->render('Menu-quizz/Menu-quizz.html.twig',);
    }
}
