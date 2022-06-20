<?php

namespace App\Entity;

use App\Repository\ClasseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClasseRepository::class)]
class Classe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nomclasse;

    #[ORM\Column(type: 'text')]
    private $descriptionclasse;

    #[ORM\OneToMany(mappedBy: 'classe', targetEntity: FichePersonnage::class)]
    private $fichePersonnages;

    public function __construct()
    {
        $this->fichePersonnages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomclasse(): ?string
    {
        return $this->nomclasse;
    }

    public function setNomclasse(string $nomclasse): self
    {
        $this->nomclasse = $nomclasse;

        return $this;
    }

    public function getDescriptionclasse(): ?string
    {
        return $this->descriptionclasse;
    }

    public function setDescriptionclasse(string $descriptionclasse): self
    {
        $this->descriptionclasse = $descriptionclasse;

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
            $fichePersonnage->setClasse($this);
        }

        return $this;
    }

    public function removeFichePersonnage(FichePersonnage $fichePersonnage): self
    {
        if ($this->fichePersonnages->removeElement($fichePersonnage)) {
            // set the owning side to null (unless already changed)
            if ($fichePersonnage->getClasse() === $this) {
                $fichePersonnage->setClasse(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return "";
    }


}
