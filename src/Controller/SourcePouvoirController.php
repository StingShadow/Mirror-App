<?php

namespace App\Controller;

use App\Entity\SourcePouvoir;
use App\Form\SourcePouvoirType;
use App\Repository\SourcePouvoirRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/sourcePouvoir')]
class SourcePouvoirController extends AbstractController
{
    #[Route('/', name: 'app_source_pouvoir_index', methods: ['GET'])]
    public function index(SourcePouvoirRepository $sourcePouvoirRepository): Response
    {
        return $this->render('source_pouvoir/index.html.twig', [
            'source_pouvoirs' => $sourcePouvoirRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_source_pouvoir_new', methods: ['GET', 'POST'])]
    public function new(Request $request, SourcePouvoirRepository $sourcePouvoirRepository): Response
    {
        $sourcePouvoir = new SourcePouvoir();
        $form = $this->createForm(SourcePouvoirType::class, $sourcePouvoir);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $sourcePouvoirRepository->add($sourcePouvoir);
            return $this->redirectToRoute('app_source_pouvoir_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('source_pouvoir/new.html.twig', [
            'source_pouvoir' => $sourcePouvoir,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_source_pouvoir_show', methods: ['GET'])]
    public function show(SourcePouvoir $sourcePouvoir): Response
    {
        return $this->render('source_pouvoir/show.html.twig', [
            'source' => $sourcePouvoir,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_source_pouvoir_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, SourcePouvoir $sourcePouvoir, SourcePouvoirRepository $sourcePouvoirRepository): Response
    {
        $form = $this->createForm(SourcePouvoirType::class, $sourcePouvoir);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $sourcePouvoirRepository->add($sourcePouvoir);
            return $this->redirectToRoute('app_source_pouvoir_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('source_pouvoir/edit.html.twig', [
            'source_pouvoir' => $sourcePouvoir,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_source_pouvoir_delete', methods: ['POST'])]
    public function delete(Request $request, SourcePouvoir $sourcePouvoir, SourcePouvoirRepository $sourcePouvoirRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sourcePouvoir->getId(), $request->request->get('_token'))) {
            $sourcePouvoirRepository->remove($sourcePouvoir);
        }

        return $this->redirectToRoute('app_source_pouvoir_index', [], Response::HTTP_SEE_OTHER);
    }
}
