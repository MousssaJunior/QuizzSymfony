<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
    /**
 * @Route("/admin/users", name="app_manage_users")
 */
public function manageUsers(): Response
{
    // Logique pour gérer les utilisateurs
    return $this->render('admin/manage_users.html.twig');
}

}
