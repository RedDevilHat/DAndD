<?php

namespace App\Entity;

use App\Repository\CharacterSubclassRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CharacterSubclassRepository::class)
 */
class CharacterSubclass
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
     * @ORM\Column(type="string", length=255)
     */
    private $subclassFlavor;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=CharacterClass::class, inversedBy="characterSubclasses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $class;

    /**
     * @ORM\OneToMany(targetEntity=Spells::class, mappedBy="subClass")
     */
    private $spells;

    public function __construct()
    {
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

    public function getSubclassFlavor(): ?string
    {
        return $this->subclassFlavor;
    }

    public function setSubclassFlavor(string $subclassFlavor): self
    {
        $this->subclassFlavor = $subclassFlavor;

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

    public function getClass(): ?CharacterClass
    {
        return $this->class;
    }

    public function setClass(?CharacterClass $class): self
    {
        $this->class = $class;

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
            $spell->setSubClass($this);
        }

        return $this;
    }

    public function removeSpell(Spells $spell): self
    {
        if ($this->spells->contains($spell)) {
            $this->spells->removeElement($spell);
            // set the owning side to null (unless already changed)
            if ($spell->getSubClass() === $this) {
                $spell->setSubClass(null);
            }
        }

        return $this;
    }
}
