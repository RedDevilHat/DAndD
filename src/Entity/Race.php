<?php

namespace App\Entity;

use App\Repository\RaceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RaceRepository::class)
 */
class Race
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
     * @ORM\Column(type="integer")
     */
    private $speed;

    /**
     * @ORM\Column(type="text")
     */
    private $alignment;

    /**
     * @ORM\Column(type="text")
     */
    private $age;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $size;

    /**
     * @ORM\Column(type="text")
     */
    private $sizeDescription;

    /**
     * @ORM\OneToMany(targetEntity=Subraces::class, mappedBy="race", orphanRemoval=true)
     */
    private $subraces;

    /**
     * @ORM\OneToMany(targetEntity=AbilityBonuses::class, mappedBy="race")
     */
    private $abilityBonuses;

    /**
     * @ORM\OneToMany(targetEntity=RaceTraits::class, mappedBy="race")
     */
    private $traits;

    public function __construct()
    {
        $this->subraces = new ArrayCollection();
        $this->abilityBonuses = new ArrayCollection();
        $this->traits = new ArrayCollection();
    }

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

    public function getSpeed(): ?int
    {
        return $this->speed;
    }

    public function setSpeed(int $speed): self
    {
        $this->speed = $speed;

        return $this;
    }

    public function getAlignment(): ?string
    {
        return $this->alignment;
    }

    public function setAlignment(string $alignment): self
    {
        $this->alignment = $alignment;

        return $this;
    }

    public function getAge(): ?string
    {
        return $this->age;
    }

    public function setAge(string $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(string $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getSizeDescription(): ?string
    {
        return $this->sizeDescription;
    }

    public function setSizeDescription(string $sizeDescription): self
    {
        $this->sizeDescription = $sizeDescription;

        return $this;
    }

    /**
     * @return Collection|Subraces[]
     */
    public function getSubraces(): Collection
    {
        return $this->subraces;
    }

    public function addSubrace(Subraces $subrace): self
    {
        if (!$this->subraces->contains($subrace)) {
            $this->subraces[] = $subrace;
            $subrace->setRace($this);
        }

        return $this;
    }

    public function removeSubrace(Subraces $subrace): self
    {
        if ($this->subraces->contains($subrace)) {
            $this->subraces->removeElement($subrace);
            // set the owning side to null (unless already changed)
            if ($subrace->getRace() === $this) {
                $subrace->setRace(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|AbilityBonuses[]
     */
    public function getAbilityBonuses(): Collection
    {
        return $this->abilityBonuses;
    }

    public function addAbilityBonus(AbilityBonuses $abilityBonus): self
    {
        if (!$this->abilityBonuses->contains($abilityBonus)) {
            $this->abilityBonuses[] = $abilityBonus;
            $abilityBonus->setRace($this);
        }

        return $this;
    }

    public function removeAbilityBonus(AbilityBonuses $abilityBonus): self
    {
        if ($this->abilityBonuses->contains($abilityBonus)) {
            $this->abilityBonuses->removeElement($abilityBonus);
            // set the owning side to null (unless already changed)
            if ($abilityBonus->getRace() === $this) {
                $abilityBonus->setRace(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|RaceTraits[]
     */
    public function getTraits(): Collection
    {
        return $this->traits;
    }

    public function addTrait(RaceTraits $trait): self
    {
        if (!$this->traits->contains($trait)) {
            $this->traits[] = $trait;
            $trait->setRace($this);
        }

        return $this;
    }

    public function removeTrait(RaceTraits $trait): self
    {
        if ($this->traits->contains($trait)) {
            $this->traits->removeElement($trait);
            // set the owning side to null (unless already changed)
            if ($trait->getRace() === $this) {
                $trait->setRace(null);
            }
        }

        return $this;
    }
}
