<?php

namespace App\Entity;

use App\Repository\FichePersonnageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FichePersonnageRepository::class)]
class FichePersonnage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom;

    #[ORM\Column(type: 'string', length: 255)]
    private $prenom;

    #[ORM\Column(type: 'integer')]
    private $age;

    #[ORM\Column(type: 'integer')]
    private $taille;

    #[ORM\Column(type: 'integer')]
    private $poids;

    #[ORM\Column(type: 'string', length: 255)]
    private $yeux;

    #[ORM\Column(type: 'string', length: 255)]
    private $cheveux;

    #[ORM\Column(type: 'integer')]
    private $constitution;

    #[ORM\Column(type: 'integer')]
    private $force_personnage;

    #[ORM\Column(type: 'integer')]
    private $perception;

    #[ORM\Column(type: 'integer')]
    private $intelligence;

    #[ORM\Column(type: 'integer')]
    private $sagesse;


    #[ORM\Column(type: 'integer')]
    private $charisme;

    #[ORM\Column(type: 'integer')]
    private $fuite;

    #[ORM\Column(type: 'integer')]
    private $dexterite;

    #[ORM\Column(type: 'string')]
    private $sexe;

    #[ORM\ManyToMany(targetEntity: Objet::class, inversedBy: 'fichePersonnages')]
    private $objets;

    #[ORM\ManyToOne(targetEntity: Classe::class, inversedBy: 'fichePersonnages')]
    private $classe;

    #[ORM\ManyToOne(targetEntity: Pays::class, inversedBy: 'fichePersonnages')]
    private $pays;

    #[ORM\ManyToOne(targetEntity: Ville::class, inversedBy: 'fichePersonnages')]
    private $ville;

    #[ORM\ManyToOne(targetEntity: Religion::class, inversedBy: 'fichePersonnages')]
    private $religion;

    #[ORM\ManyToOne(targetEntity: Race::class, inversedBy: 'fichePersonnages')]
    private $race;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: 'fichePersonnages')]
    private $utilisateur;

    /**
     * @return mixed
     */
    public function getSagesse()
    {
        return $this->sagesse;
    }

    /**
     * @param mixed $sagesse
     */
    public function setSagesse($sagesse): void
    {
        $this->sagesse = $sagesse;
    }

    /**
     * @return mixed
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * @param mixed $sexe
     */
    public function setSexe($sexe): void
    {
        $this->sexe = $sexe;
    }

    public function __construct()
    {
        $this->objets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getTaille(): ?int
    {
        return $this->taille;
    }

    public function setTaille(int $taille): self
    {
        $this->taille = $taille;

        return $this;
    }

    public function getPoids(): ?int
    {
        return $this->poids;
    }

    public function setPoids(int $poids): self
    {
        $this->poids = $poids;

        return $this;
    }

    public function getYeux(): ?string
    {
        return $this->yeux;
    }

    public function setYeux(string $yeux): self
    {
        $this->yeux = $yeux;

        return $this;
    }

    public function getCheveux(): ?string
    {
        return $this->cheveux;
    }

    public function setCheveux(string $cheveux): self
    {
        $this->cheveux = $cheveux;

        return $this;
    }

    public function getConstitution(): ?int
    {
        return $this->constitution;
    }

    public function setConstitution(int $constitution): self
    {
        $this->constitution = $constitution;

        return $this;
    }

    public function getForcePersonnage(): ?int
    {
        return $this->force_personnage;
    }

    public function setForcePersonnage(int $force_personnage): self
    {
        $this->force_personnage = $force_personnage;

        return $this;
    }

    public function getPerception(): ?int
    {
        return $this->perception;
    }

    public function setPerception(int $perception): self
    {
        $this->perception = $perception;

        return $this;
    }

    public function getIntelligence(): ?int
    {
        return $this->intelligence;
    }

    public function setIntelligence(int $intelligence): self
    {
        $this->intelligence = $intelligence;

        return $this;
    }

    public function getCharisme(): ?int
    {
        return $this->charisme;
    }

    public function setCharisme(int $charisme): self
    {
        $this->charisme = $charisme;

        return $this;
    }

    public function getFuite(): ?int
    {
        return $this->fuite;
    }

    public function setFuite(int $fuite): self
    {
        $this->fuite = $fuite;

        return $this;
    }

    public function getDexterite(): ?int
    {
        return $this->dexterite;
    }

    public function setDexterite(int $dexterite): self
    {
        $this->dexterite = $dexterite;

        return $this;
    }

    /**
     * @return Collection<int, objet>
     */
    public function getObjets(): Collection
    {
        return $this->objets;
    }

    public function addObjet(objet $objet): self
    {
        if (!$this->objets->contains($objet)) {
            $this->objets[] = $objet;
        }

        return $this;
    }

    public function removeObjet(objet $objet): self
    {
        $this->objets->removeElement($objet);

        return $this;
    }

    public function getClasse(): ?classe
    {
        return $this->classe;
    }

    public function setClasse(?classe $classe): self
    {
        $this->classe = $classe;

        return $this;
    }

    public function getPays(): ?pays
    {
        return $this->pays;
    }

    public function setPays(?pays $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getVille(): ?ville
    {
        return $this->ville;
    }

    public function setVille(?ville $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getReligion(): ?religion
    {
        return $this->religion;
    }

    public function setReligion(?religion $religion): self
    {
        $this->religion = $religion;

        return $this;
    }

    public function getRace(): ?race
    {
        return $this->race;
    }

    public function setRace(?race $race): self
    {
        $this->race = $race;

        return $this;
    }

    public function getUtilisateur(): ?utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }
}
