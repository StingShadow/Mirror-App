<?php

namespace App\Entity;

use App\Repository\VilleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VilleRepository::class)]
class Ville
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom_ville;

    #[ORM\Column(type: 'text')]
    private $description_ville;

    #[ORM\ManyToOne(targetEntity: Pays::class, inversedBy: 'villes')]
    private $Pays;

    #[ORM\OneToMany(mappedBy: 'ville', targetEntity: FichePersonnage::class)]
    private $fichePersonnages;

    public function __construct()
    {
        $this->fichePersonnages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomVille(): ?string
    {
        return $this->nom_ville;
    }

    public function setNomVille(string $nom_ville): self
    {
        $this->nom_ville = $nom_ville;

        return $this;
    }

    public function getDescriptionVille(): ?string
    {
        return $this->description_ville;
    }

    public function setDescriptionVille(string $description_ville): self
    {
        $this->description_ville = $description_ville;

        return $this;
    }

    public function getPays(): ?pays
    {
        return $this->Pays;
    }

    public function setPays(?pays $Pays): self
    {
        $this->Pays = $Pays;

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
            $fichePersonnage->setVille($this);
        }

        return $this;
    }

    public function removeFichePersonnage(FichePersonnage $fichePersonnage): self
    {
        if ($this->fichePersonnages->removeElement($fichePersonnage)) {
            // set the owning side to null (unless already changed)
            if ($fichePersonnage->getVille() === $this) {
                $fichePersonnage->setVille(null);
            }
        }

        return $this;
    }
}
