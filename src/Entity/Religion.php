<?php

namespace App\Entity;

use App\Repository\ReligionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReligionRepository::class)]
class Religion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nomreligion;

    #[ORM\Column(type: 'text')]
    private $descriptionreligion;

    #[ORM\OneToMany(mappedBy: 'religion', targetEntity: FichePersonnage::class)]
    private $fichePersonnages;

    public function __construct()
    {
        $this->fichePersonnages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomreligion(): ?string
    {
        return $this->nomreligion;
    }

    public function setNomreligion(string $nomreligion): self
    {
        $this->nomreligion = $nomreligion;

        return $this;
    }

    public function getDescriptionreligion(): ?string
    {
        return $this->descriptionreligion;
    }

    public function setDescriptionreligion(string $descriptionreligion): self
    {
        $this->descriptionreligion = $descriptionreligion;

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
            $fichePersonnage->setReligion($this);
        }

        return $this;
    }

    public function removeFichePersonnage(FichePersonnage $fichePersonnage): self
    {
        if ($this->fichePersonnages->removeElement($fichePersonnage)) {
            // set the owning side to null (unless already changed)
            if ($fichePersonnage->getReligion() === $this) {
                $fichePersonnage->setReligion(null);
            }
        }

        return $this;
    }
}
