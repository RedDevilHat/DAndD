<?php

namespace App\Entity;

use App\Repository\CharacterClassRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CharacterClassRepository::class)
 */
class CharacterClass
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
    private $hitDie;

    /**
     * @ORM\OneToMany(targetEntity=CharacterSubclass::class, mappedBy="class", orphanRemoval=true)
     */
    private $characterSubclasses;

    /**
     * @ORM\OneToMany(targetEntity=CharacterClassFeatures::class, mappedBy="class", orphanRemoval=true)
     */
    private $characterClassFeatures;

    /**
     * @ORM\OneToMany(targetEntity=Spells::class, mappedBy="class")
     */
    private $spells;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    public function __construct()
    {
        $this->characterSubclasses = new ArrayCollection();
        $this->characterClassFeatures = new ArrayCollection();
        $this->spells = new ArrayCollection();
    }

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

    public function getHitDie(): ?int
    {
        return $this->hitDie;
    }

    public function setHitDie(int $hitDie): self
    {
        $this->hitDie = $hitDie;

        return $this;
    }

    /**
     * @return Collection|CharacterSubclass[]
     */
    public function getCharacterSubclasses(): Collection
    {
        return $this->characterSubclasses;
    }

    public function addCharacterSubclass(CharacterSubclass $characterSubclass): self
    {
        if (!$this->characterSubclasses->contains($characterSubclass)) {
            $this->characterSubclasses[] = $characterSubclass;
            $characterSubclass->setClass($this);
        }

        return $this;
    }

    public function removeCharacterSubclass(CharacterSubclass $characterSubclass): self
    {
        if ($this->characterSubclasses->contains($characterSubclass)) {
            $this->characterSubclasses->removeElement($characterSubclass);
            // set the owning side to null (unless already changed)
            if ($characterSubclass->getClass() === $this) {
                $characterSubclass->setClass(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CharacterClassFeatures[]
     */
    public function getCharacterClassFeatures(): Collection
    {
        return $this->characterClassFeatures;
    }

    public function addCharacterClassFeature(CharacterClassFeatures $characterClassFeature): self
    {
        if (!$this->characterClassFeatures->contains($characterClassFeature)) {
            $this->characterClassFeatures[] = $characterClassFeature;
            $characterClassFeature->setClass($this);
        }

        return $this;
    }

    public function removeCharacterClassFeature(CharacterClassFeatures $characterClassFeature): self
    {
        if ($this->characterClassFeatures->contains($characterClassFeature)) {
            $this->characterClassFeatures->removeElement($characterClassFeature);
            // set the owning side to null (unless already changed)
            if ($characterClassFeature->getClass() === $this) {
                $characterClassFeature->setClass(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Spells[]
     */
    public function getSpells(): Collection
    {
        return $this->spells;
    }

    public function addSpell(Spells $spell): self
    {
        if (!$this->spells->contains($spell)) {
            $this->spells[] = $spell;
            $spell->setClass($this);
        }

        return $this;
    }

    public function removeSpell(Spells $spell): self
    {
        if ($this->spells->contains($spell)) {
            $this->spells->removeElement($spell);
            // set the owning side to null (unless already changed)
            if ($spell->getClass() === $this) {
                $spell->setClass(null);
            }
        }

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
}
