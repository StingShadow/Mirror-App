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
    private $nomrarete;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomrarete(): ?string
    {
        return $this->nomrarete;
    }

    public function setNomrarete(string $nomrarete): self
    {
        $this->nomrarete = $nomrarete;

        return $this;
    }
}
