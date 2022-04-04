<?php

namespace App\Entity;

use App\Repository\RareteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RareteRepository::class)]
class Rarete
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom_rarete;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomRarete(): ?string
    {
        return $this->nom_rarete;
    }

    public function setNomRarete(string $nom_rarete): self
    {
        $this->nom_rarete = $nom_rarete;

        return $this;
    }
}
