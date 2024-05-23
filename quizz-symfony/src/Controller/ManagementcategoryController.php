<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ManagementcategoryController extends AbstractController
{
    #[Route('/managementcategory', name: 'app_managementcategory')]
    public function index(): Response
    {
        return $this->render('managementcategory/index.html.twig', [
            'controller_name' => 'ManagementcategoryController',
        ]);
    }
}
