<?php

namespace App\Entity;

use App\Repository\AbilityBonusesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AbilityBonusesRepository::class)
 */
class AbilityBonuses
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $bonus;

    /**
     * @ORM\ManyToOne(targetEntity=Race::class, inversedBy="abilityBonuses")
     */
    private $race;

    /**
     * @ORM\ManyToOne(targetEntity=Subraces::class, inversedBy="abilityBonuses")
     */
    private $subraces;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getBonus(): ?int
    {
        return $this->bonus;
    }

    public function setBonus(int $bonus): self
    {
        $this->bonus = $bonus;

        return $this;
    }

    public function getRace(): ?Race
    {
        return $this->race;
    }

    public function setRace(?Race $race): self
    {
        $this->race = $race;

        return $this;
    }

    public function getSubraces(): ?Subraces
    {
        return $this->subraces;
    }

    public function setSubraces(?Subraces $subraces): self
    {
        $this->subraces = $subraces;

        return $this;
    }
}
