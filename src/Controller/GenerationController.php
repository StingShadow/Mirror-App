<?php

namespace App\Controller;

use App\Entity\FichePersonnage;
use App\Form\FichePersonnageType;
use App\Repository\FichePersonnageRepository;
use App\Repository\UtilisateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use ZipArchive;

class GenerationController extends AbstractController
{
    #[Route('/generation', name: 'generation', methods: ['GET', 'POST'])]
    public function fiche(Request $req, UtilisateurRepository $user, FichePersonnageRepository $fichePersonnageRepository)
    {
        $Ficheperso = new FichePersonnage();
        $form = $this->createForm(FichePersonnageType::class, $Ficheperso);
        $form->handleRequest($req);

        if ($form->isSubmitted()) {


            $utilisateur = $user->findOneByMail($this->getUser()->getUserIdentifier());
            $Ficheperso->setUtilisateur($utilisateur);
            $donnees = $form->getData();
            $file = "content.xml";


           $fichePersonnageRepository->add($Ficheperso);


            $data = [ "prenom" => $donnees->getPrenom(),"race" => $donnees->getRace()->getNomRace(),"nom" => $donnees->getNom(),
                "sexe" => $donnees->getSexe(), "age" => $donnees->getAge(), "taille" => $donnees->getTaille(),
                "poids" => $donnees->getPoids(), "yeux" => $donnees->getYeux(), "cheveux" => $donnees->getCheveux(),
                "classe" => $donnees->getClasse()->getNomClasse(), "pays" => $donnees->getPays()->getNomPays(),  "ville" => $donnees->getVille()->getNomVille(),
                "religion" => $donnees->getReligion()->getNomReligion(),"constitution" => $donnees->getConstitution(),"force" => $donnees->getForcePersonnage(),
                "perception" => $donnees->getPerception(),"intelligence" => $donnees->getIntelligence(),"charisme" => $donnees->getCharisme(), "fuite" => $donnees->getFuite(),
                "dexterite" => $donnees->getDexterite(), "sagesse" => $donnees->getSagesse()];


            $zip = new ZipArchive;
            $res = $zip->open('fiche de personnage template.odt');

            $zip->extractTo('./', 'content.xml');

            $zip->close();

            copy('fiche de personnage.odt','fiche copier.odt');
            $res = $zip->open('fiche copier.odt');
            $zip->deleteName('content.xml');



            $recherche = array("prenomform","nomform", "raceform", "sexeform", "ageform", "tailleform", "poidsform", "yeuxform", "cheveuxform",
                "classeform","rangform","paysform","villeform","religionform","constitutionform","forceform","perception","intelligenceform"
            ,"charismeform","fuiteform","dexteriteform","sagesseform");
            $str = file_get_contents($file);


            foreach($data as $k => $v) {
                foreach ($recherche as $r => $vr){

                    if ($vr == $k."form"){

                        if ($vr != $v) {
                            //recupere la totalité du fichier
                            $str = file_get_contents($file);
                            if ($str === false) {
                                return false;
                            } else {
                                //effectue le remplacement dans le texte
                                $str = str_replace($vr, $v, $str);
                                //remplace dans le fichier
                                if (file_put_contents($file, $str) === false) {
                                    return false;
                                }
                            }
                        }
                    }
                }
            }
            $str = str_replace("joueurform", $utilisateur->getPseudo(), $str);
            if (file_put_contents($file, $str) === false) {
                return false;
            }
            $zip->addFile("content.xml");
            $zip->close();
            unlink('content.xml');
            rename("fiche copier.odt", "fiche/fiche de personnage"." ".$utilisateur->getPseudo()."-".$donnees->getPrenom().$donnees->getNom().".odt");


        }

        return $this->render('generation/generation.html.twig', [
            'FicheForm' => $form->createView()
        ]);
    }

    #[Route('/senddoc/{string}', name: 'sendoc')]
    public function sendResponse(Request $req, UtilisateurRepository $user, String $string)
    {
        $utilisateur = $user->findOneByMail($this->getUser()->getUserIdentifier());
        $filename = "fiche/fiche de personnage"." ".$utilisateur->getPseudo()."-".$string.".odt";

        if(file_exists($filename)){

            //Get file type and set it as Content Type
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            header('Content-Type: ' . finfo_file($finfo, $filename));
            finfo_close($finfo);

            //Use Content-Disposition: attachment to specify the filename
            header('Content-Disposition: attachment; filename='.basename($filename));

            //No cache
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');

            //Define file size
            header('Content-Length: ' . filesize($filename));

            ob_clean();
            flush();
            readfile($filename);
        } else {
            // Si aucune fiche n'est associé
            // On envoie une alerte disant que l'adresse e-mail est inconnue
            $this->addFlash('danger', 'Aucune fiche associé a ce profil');

            // On retourne sur la page du profil
            return $this->redirectToRoute('app_profil');
        }
    }
}
