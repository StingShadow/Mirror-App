<?php

namespace App\Entity;

use App\Repository\ThemeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Nullable;

#[ORM\Entity(repositoryClass: ThemeRepository::class)]
class Theme
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $titre_theme;

    #[ORM\Column(type: 'text')]
    private $description_theme;

    #[ORM\OneToMany(mappedBy: 'theme', targetEntity: Message::class)]
    private $messages;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: 'themes')]
    private $utilisateur;

    #[ORM\ManyToOne(targetEntity: Campagne::class, inversedBy: 'themes')]
    private $campagne;


    public function __construct()
    {
        $this->messages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreTheme(): ?string
    {
        return $this->titre_theme;
    }

    public function setTitreTheme(string $titre_theme): self
    {
        $this->titre_theme = $titre_theme;

        return $this;
    }

    public function getDescriptionTheme(): ?string
    {
        return $this->description_theme;
    }

    public function setDescriptionTheme(string $description_theme): self
    {
        $this->description_theme = $description_theme;

        return $this;
    }

    /**
     * @return Collection<int, Message>
     */
    public function getMessages(): Collection
    {
        return $this->messages;
    }

    public function addMessage(Message $message): self
    {
        if (!$this->messages->contains($message)) {
            $this->messages[] = $message;
            $message->setTheme($this);
        }

        return $this;
    }

    public function removeMessage(Message $message): self
    {
        if ($this->messages->removeElement($message)) {
            // set the owning side to null (unless already changed)
            if ($message->getTheme() === $this) {
                $message->setTheme(null);
            }
        }

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

    public function getCampagne(): ?campagne
    {
        return $this->campagne;
    }

    public function setCampagne(?campagne $campagne): self
    {
        $this->campagne = $campagne;

        return $this;
    }

}
