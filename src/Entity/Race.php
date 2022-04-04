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
    private $nom_race;

    #[ORM\Column(type: 'text')]
    private $description_race;

    #[ORM\Column(type: 'text')]
    private $capacite_race;

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

    public function getNomRace(): ?string
    {
        return $this->nom_race;
    }

    public function setNomRace(string $nom_race): self
    {
        $this->nom_race = $nom_race;

        return $this;
    }

    public function getDescriptionRace(): ?string
    {
        return $this->description_race;
    }

    public function setDescriptionRace(string $description_race): self
    {
        $this->description_race = $description_race;

        return $this;
    }

    public function getCapaciteRace(): ?string
    {
        return $this->capacite_race;
    }

    public function setCapaciteRace(string $capacite_race): self
    {
        $this->capacite_race = $capacite_race;

        return $this;
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
}
