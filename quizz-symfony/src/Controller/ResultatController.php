<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class ResultatController extends AbstractController
{
    #[Route('/resultat/{resultat}/{AllQuestion}', name: 'app_resultat')]
    public function index(Request $request, $resultat , $AllQuestion): Response
    {
        // dd($resultat, $AllQuestion);
        return $this->render('resultat/index.html.twig', ['resultat' => $resultat, 'total' => $AllQuestion]);
    }
}
