<?php

namespace App\Controller;

use App\Entity\Campagne;
use App\Repository\CampagneRepository;
use App\Repository\FichePersonnageRepository;
use App\Repository\MessageRepository;
use App\Repository\ThemeRepository;
use App\Repository\UtilisateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(ThemeRepository $themeRepository): Response
    {
        $themes = $themeRepository->findAllDESC10();
        $theme1 = [];
        $i = 0;
        $array1 = array_slice($themes, 0, 4);
        $array2 = array_slice($themes, 4, 8);
        foreach ($themes as $theme) {
            array_push($theme1,$theme);
        };


        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'themes' => $array1,
            'themeSup' => $array2
        ]);
    }

    #[Route('/profil', name: 'app_profil')]
    public function profil(CampagneRepository $campagneRepository, UtilisateurRepository $user, FichePersonnageRepository $fiche): Response
    {
        $utilisateur = $user->findOneByMail($this->getUser()->getUserIdentifier());
        $campagneList = $campagneRepository->findByUtilisateur($utilisateur);
        $ficheList = $fiche->findByUtilisateur($utilisateur);
        return $this->render('profil.html.twig', [
            'campagnes' => $campagneList,
            'fiches' => $ficheList
        ]);
    }
}
