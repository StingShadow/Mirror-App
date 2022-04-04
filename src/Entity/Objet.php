<?php

namespace App\Entity;

use App\Repository\ObjetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ObjetRepository::class)]
class Objet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom_objet;

    #[ORM\Column(type: 'text')]
    private $description_objet;

    #[ORM\Column(type: 'text')]
    private $effet_objet;

    #[ORM\ManyToMany(targetEntity: FichePersonnage::class, mappedBy: 'objets')]
    private $fichePersonnages;

    public function __construct()
    {
        $this->fichePersonnages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomObjet(): ?string
    {
        return $this->nom_objet;
    }

    public function setNomObjet(string $nom_objet): self
    {
        $this->nom_objet = $nom_objet;

        return $this;
    }

    public function getDescriptionObjet(): ?string
    {
        return $this->description_objet;
    }

    public function setDescriptionObjet(string $description_objet): self
    {
        $this->description_objet = $description_objet;

        return $this;
    }

    public function getEffetObjet(): ?string
    {
        return $this->effet_objet;
    }

    public function setEffetObjet(string $effet_objet): self
    {
        $this->effet_objet = $effet_objet;

        return $this;
    }

    /**
     * @return Collection<int, FichePersonnage>
     */
    public function getFichePersonnages(): Collection
    {
        return $this->fichePersonnages;
    }

    public function addFichePersonnage(FichePersonnage $fichePersonnage): self
    {
        if (!$this->fichePersonnages->contains($fichePersonnage)) {
            $this->fichePersonnages[] = $fichePersonnage;
            $fichePersonnage->addObjet($this);
        }

        return $this;
    }

    public function removeFichePersonnage(FichePersonnage $fichePersonnage): self
    {
        if ($this->fichePersonnages->removeElement($fichePersonnage)) {
            $fichePersonnage->removeObjet($this);
        }

        return $this;
    }
}
