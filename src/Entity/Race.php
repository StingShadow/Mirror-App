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
    private $histoire;

    #[ORM\Column(type: 'text')]
    private $caratere;

    #[ORM\Column(type: 'text')]
    private $caracteristique_physique;

    #[ORM\Column(type: 'text')]
    private $croyances;


    #[ORM\Column(type: 'text')]
    private $capaciterace;

    #[ORM\OneToMany(mappedBy: 'race', targetEntity: Creature::class)]
    private $creatures;

    #[ORM\OneToMany(mappedBy: 'race', targetEntity: FichePersonnage::class)]
    private $fichePersonnages;

    #[ORM\ManyToMany(targetEntity: SourcePouvoir::class, inversedBy: 'races')]
    private $sourcePouvoir;



    public function __construct()
    {
        $this->creatures = new ArrayCollection();
        $this->fichePersonnages = new ArrayCollection();
        $this->sourcePouvoir = new ArrayCollection();
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
    public function getHistoire()
    {
        return $this->histoire;
    }

    /**
     * @param mixed $histoire
     */
    public function setHistoire($histoire): void
    {
        $this->histoire = $histoire;
    }

    /**
     * @return mixed
     */
    public function getCaratere()
    {
        return $this->caratere;
    }

    /**
     * @param mixed $caratere
     */
    public function setCaratere($caratere): void
    {
        $this->caratere = $caratere;
    }

    /**
     * @return mixed
     */
    public function getCaracteristiquePhysique()
    {
        return $this->caracteristique_physique;
    }

    /**
     * @param mixed $caracteristique_physique
     */
    public function setCaracteristiquePhysique($caracteristique_physique): void
    {
        $this->caracteristique_physique = $caracteristique_physique;
    }
    /**
     * @return mixed
     */
    public function getCroyances()
    {
        return $this->croyances;
    }

    /**
     * @param mixed $croyances
     */
    public function setCroyances($croyances): void
    {
        $this->croyances = $croyances;
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

    /**
     * @return Collection<int, SourcePouvoir>
     */
    public function getSourcePouvoir(): Collection
    {
        return $this->sourcePouvoir;
    }

    public function addSourcePouvoir(SourcePouvoir $sourcePouvoir): self
    {
        if (!$this->sourcePouvoir->contains($sourcePouvoir)) {
            $this->sourcePouvoir[] = $sourcePouvoir;
        }

        return $this;
    }

    public function removeSourcePouvoir(SourcePouvoir $sourcePouvoir): self
    {
        $this->sourcePouvoir->removeElement($sourcePouvoir);

        return $this;
    }


}
