<?php

namespace App\Entity;

use App\Repository\RaceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RaceRepository::class)]
class Race
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nomrace;

    #[ORM\Column(type: 'text')]
    private $descriptionrace;

    #[ORM\Column(type: 'text')]
    private $capaciterace;

    #[ORM\OneToMany(mappedBy: 'race', targetEntity: Creature::class)]
    private $creatures;

    #[ORM\OneToMany(mappedBy: 'race', targetEntity: FichePersonnage::class)]
    private $fichePersonnages;

    public function __construct()
    {
        $this->creatures = new ArrayCollection();
        $this->fichePersonnages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNomrace()
    {
        return $this->nomrace;
    }

    /**
     * @param mixed $nomrace
     */
    public function setNomrace($nomrace): void
    {
        $this->nomrace = $nomrace;
    }

    /**
     * @return mixed
     */
    public function getDescriptionrace()
    {
        return $this->descriptionrace;
    }

    /**
     * @param mixed $descriptionrace
     */
    public function setDescriptionrace($descriptionrace): void
    {
        $this->descriptionrace = $descriptionrace;
    }

    /**
     * @return mixed
     */
    public function getCapaciterace()
    {
        return $this->capaciterace;
    }

    /**
     * @param mixed $capaciterace
     */
    public function setCapaciterace($capaciterace): void
    {
        $this->capaciterace = $capaciterace;
    }


    /**
     * @return Collection<int, Creature>
     */
    public function getCreatures(): Collection
    {
        return $this->creatures;
    }

    public function addCreature(Creature $creature): self
    {
        if (!$this->creatures->contains($creature)) {
            $this->creatures[] = $creature;
            $creature->setRace($this);
        }

        return $this;
    }

    public function removeCreature(Creature $creature): self
    {
        if ($this->creatures->removeElement($creature)) {
            // set the owning side to null (unless already changed)
            if ($creature->getRace() === $this) {
                $creature->setRace(null);
            }
        }

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
            $fichePersonnage->setRace($this);
        }

        return $this;
    }

    public function removeFichePersonnage(FichePersonnage $fichePersonnage): self
    {
        if ($this->fichePersonnages->removeElement($fichePersonnage)) {
            // set the owning side to null (unless already changed)
            if ($fichePersonnage->getRace() === $this) {
                $fichePersonnage->setRace(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return "";
    }


}
