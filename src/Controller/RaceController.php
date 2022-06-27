<?php

namespace App\Controller;

use App\Entity\Race;
use App\Form\RaceType;
use App\Repository\RaceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/race')]
class RaceController extends AbstractController
{
    #[Route('/new', name: 'app_race_new', methods: ['GET', 'POST'])]
    public function new(Request $request, RaceRepository $raceRepository): Response
    {
        $race = new Race();
        $form = $this->createForm(RaceType::class, $race);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $raceRepository->add($race);
            return $this->redirectToRoute('app_race_list', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('race/new.html.twig', [
            'race' => $race,
            'form' => $form,
        ]);
    }
    #[Route('/', name: 'app_race_list', methods: ['GET'])]
    public function list(RaceRepository $raceRepository): Response
    {
        return $this->render('race/list.html.twig', [
            'races' => $raceRepository->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'app_race_show', methods: ['GET'])]
    public function show(Race $race): Response
    {
        $histoires = explode("|",$race->getHistoire());
        $physique = explode("|", $race->getCaracteristiquePhysique());
        $croyance = explode("|", $race->getCroyances());
        return $this->render('race/show.html.twig', [
            'croyances' => $croyance,
            'physiques' => $physique,
            'histoires' => $histoires,
            'race' => $race,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_race_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Race $race, RaceRepository $raceRepository): Response
    {
        $form = $this->createForm(RaceType::class, $race);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $raceRepository->add($race);
            return $this->redirectToRoute('app_race_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('race/edit.html.twig', [
            'race' => $race,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_race_delete', methods: ['POST'])]
    public function delete(Request $request, Race $race, RaceRepository $raceRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$race->getId(), $request->request->get('_token'))) {
            $raceRepository->remove($race);
        }

        return $this->redirectToRoute('app_race_index', [], Response::HTTP_SEE_OTHER);
    }
}
