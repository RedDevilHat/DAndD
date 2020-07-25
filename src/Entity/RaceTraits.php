<?php

namespace App\Entity;

use App\Repository\RaceTraitsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RaceTraitsRepository::class)
 */
class RaceTraits
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
    private $index;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Race::class, inversedBy="traits")
     */
    private $race;

    /**
     * @ORM\ManyToOne(targetEntity=Subraces::class, inversedBy="traits")
     */
    private $subraces;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIndex(): ?string
    {
        return $this->index;
    }

    public function setIndex(string $index): self
    {
        $this->index = $index;

        return $this;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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
