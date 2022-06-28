<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArmurerieController extends AbstractController
{
    #[Route('/armurerie', name: 'app_armurerie')]
    public function index(): Response
    {
        return $this->render('armurerie/index.html.twig', [
            'controller_name' => 'ArmurerieController',
        ]);
    }
}
