<?php

namespace App\Controller;

use App\Entity\Rarete;
use App\Form\RareteType;
use App\Repository\RareteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/rarete')]
class RareteController extends AbstractController
{
    #[Route('/', name: 'app_rarete_index', methods: ['GET'])]
    public function index(RareteRepository $rareteRepository): Response
    {
        return $this->render('rarete/index.html.twig', [
            'raretes' => $rareteRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_rarete_new', methods: ['GET', 'POST'])]
    public function new(Request $request, RareteRepository $rareteRepository): Response
    {
        $rarete = new Rarete();
        $form = $this->createForm(RareteType::class, $rarete);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $rareteRepository->add($rarete);
            return $this->redirectToRoute('app_rarete_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('rarete/new.html.twig', [
            'rarete' => $rarete,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_rarete_show', methods: ['GET'])]
    public function show(Rarete $rarete): Response
    {
        return $this->render('rarete/show.html.twig', [
            'rarete' => $rarete,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_rarete_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Rarete $rarete, RareteRepository $rareteRepository): Response
    {
        $form = $this->createForm(RareteType::class, $rarete);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $rareteRepository->add($rarete);
            return $this->redirectToRoute('app_rarete_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('rarete/edit.html.twig', [
            'rarete' => $rarete,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_rarete_delete', methods: ['POST'])]
    public function delete(Request $request, Rarete $rarete, RareteRepository $rareteRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$rarete->getId(), $request->request->get('_token'))) {
            $rareteRepository->remove($rarete);
        }

        return $this->redirectToRoute('app_rarete_index', [], Response::HTTP_SEE_OTHER);
    }
}
