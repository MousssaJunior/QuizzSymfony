<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class NavabrController extends AbstractController
{
    #[Route('/navabr', name: 'app_navabr')]
    public function index(): Response
    {
        return $this->render('navabr/index.html.twig', [
            'controller_name' => 'NavabrController',
        ]);
    }
}
