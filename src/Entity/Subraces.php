<?php

namespace App\Entity;

use App\Repository\SubracesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SubracesRepository::class)
 */
class Subraces
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
     * @ORM\ManyToOne(targetEntity=Race::class, inversedBy="subraces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $race;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=AbilityBonuses::class, mappedBy="subraces")
     */
    private $abilityBonuses;

    /**
     * @ORM\OneToMany(targetEntity=RaceTraits::class, mappedBy="subraces")
     */
    private $traits;

    public function __construct()
    {
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

    public function getRace(): ?Race
    {
        return $this->race;
    }

    public function setRace(?Race $race): self
    {
        $this->race = $race;

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
            $abilityBonus->setSubraces($this);
        }

        return $this;
    }

    public function removeAbilityBonus(AbilityBonuses $abilityBonus): self
    {
        if ($this->abilityBonuses->contains($abilityBonus)) {
            $this->abilityBonuses->removeElement($abilityBonus);
            // set the owning side to null (unless already changed)
            if ($abilityBonus->getSubraces() === $this) {
                $abilityBonus->setSubraces(null);
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
            $trait->setSubraces($this);
        }

        return $this;
    }

    public function removeTrait(RaceTraits $trait): self
    {
        if ($this->traits->contains($trait)) {
            $this->traits->removeElement($trait);
            // set the owning side to null (unless already changed)
            if ($trait->getSubraces() === $this) {
                $trait->setSubraces(null);
            }
        }

        return $this;
    }
}
