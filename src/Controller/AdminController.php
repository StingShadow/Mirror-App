<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/admin/crud', name: 'app_admin_crud')]
    public function index(): Response
    {
        return $this->render('admin/crud.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
}
