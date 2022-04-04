<?php

namespace App\Controller;

use App\Entity\FichePersonnage;
use App\Form\FichePersonnageType;
use App\Repository\FichePersonnageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/fiche/personnage')]
class FichePersonnageController extends AbstractController
{
    #[Route('/', name: 'app_fiche_personnage_index', methods: ['GET'])]
    public function index(FichePersonnageRepository $fichePersonnageRepository): Response
    {
        return $this->render('fiche_personnage/index.html.twig', [
            'fiche_personnages' => $fichePersonnageRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_fiche_personnage_new', methods: ['GET', 'POST'])]
    public function new(Request $request, FichePersonnageRepository $fichePersonnageRepository): Response
    {
        $fichePersonnage = new FichePersonnage();
        $form = $this->createForm(FichePersonnageType::class, $fichePersonnage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $fichePersonnageRepository->add($fichePersonnage);
            return $this->redirectToRoute('app_fiche_personnage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('fiche_personnage/new.html.twig', [
            'fiche_personnage' => $fichePersonnage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_fiche_personnage_show', methods: ['GET'])]
    public function show(FichePersonnage $fichePersonnage): Response
    {
        return $this->render('fiche_personnage/show.html.twig', [
            'fiche_personnage' => $fichePersonnage,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_fiche_personnage_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, FichePersonnage $fichePersonnage, FichePersonnageRepository $fichePersonnageRepository): Response
    {
        $form = $this->createForm(FichePersonnageType::class, $fichePersonnage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $fichePersonnageRepository->add($fichePersonnage);
            return $this->redirectToRoute('app_fiche_personnage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('fiche_personnage/edit.html.twig', [
            'fiche_personnage' => $fichePersonnage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_fiche_personnage_delete', methods: ['POST'])]
    public function delete(Request $request, FichePersonnage $fichePersonnage, FichePersonnageRepository $fichePersonnageRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fichePersonnage->getId(), $request->request->get('_token'))) {
            $fichePersonnageRepository->remove($fichePersonnage);
        }

        return $this->redirectToRoute('app_fiche_personnage_index', [], Response::HTTP_SEE_OTHER);
    }


}
