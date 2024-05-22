<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ManageusersController extends AbstractController
{
    #[Route('/manageusers', name: 'app_manageusers')]
    public function index(): Response
    {
        return $this->render('manageusers/index.html.twig', [
            'controller_name' => 'ManageusersController',
        ]);
    }
}
