<?php

namespace App\Entity;

use App\Repository\CampagneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CampagneRepository::class)]
class Campagne
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $titre_campagne;

    #[ORM\Column(type: 'text')]
    private $description_campagne;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: 'campagne')]
    private $utilisateur;

    #[ORM\OneToMany(mappedBy: 'campagne', targetEntity: Theme::class)]
    private $themes;

    public function __construct()
    {
        $this->themes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreCampagne(): ?string
    {
        return $this->titre_campagne;
    }

    public function setTitreCampagne(string $titre_campagne): self
    {
        $this->titre_campagne = $titre_campagne;

        return $this;
    }

    public function getDescriptionCampagne(): ?string
    {
        return $this->description_campagne;
    }

    public function setDescriptionCampagne(string $description_campagne): self
    {
        $this->description_campagne = $description_campagne;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * @return Collection<int, Theme>
     */
    public function getThemes(): Collection
    {
        return $this->themes;
    }

    public function addTheme(Theme $theme): self
    {
        if (!$this->themes->contains($theme)) {
            $this->themes[] = $theme;
            $theme->setCampagne($this);
        }

        return $this;
    }

    public function removeTheme(Theme $theme): self
    {
        if ($this->themes->removeElement($theme)) {
            // set the owning side to null (unless already changed)
            if ($theme->getCampagne() === $this) {
                $theme->setCampagne(null);
            }
        }

        return $this;
    }
}
