<?php

namespace App\Entity;

use App\Repository\CreatureRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CreatureRepository::class)]
class Creature
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom_creature;

    #[ORM\Column(type: 'text', nullable: true)]
    private $description_creature;

    #[ORM\Column(type: 'string', length: 255)]
    private $habitat_creature;

    #[ORM\Column(type: 'string', length: 255)]
    private $regime_creature;

    #[ORM\ManyToOne(targetEntity: Race::class, inversedBy: 'creatures')]
    private $race;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCreature(): ?string
    {
        return $this->nom_creature;
    }

    public function setNomCreature(string $nom_creature): self
    {
        $this->nom_creature = $nom_creature;

        return $this;
    }

    public function getDescriptionCreature(): ?string
    {
        return $this->description_creature;
    }

    public function setDescriptionCreature(?string $description_creature): self
    {
        $this->description_creature = $description_creature;

        return $this;
    }

    public function getHabitatCreature(): ?string
    {
        return $this->habitat_creature;
    }

    public function setHabitatCreature(string $habitat_creature): self
    {
        $this->habitat_creature = $habitat_creature;

        return $this;
    }

    public function getRegimeCreature(): ?string
    {
        return $this->regime_creature;
    }

    public function setRegimeCreature(string $regime_creature): self
    {
        $this->regime_creature = $regime_creature;

        return $this;
    }

    public function getRace(): ?race
    {
        return $this->race;
    }

    public function setRace(?race $race): self
    {
        $this->race = $race;

        return $this;
    }
}
