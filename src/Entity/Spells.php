<?php

namespace App\Entity;

use App\Repository\SpellsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SpellsRepository::class)
 */
class Spells
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
     * @ORM\Column(type="text")
     */
    private $higherLevel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $page;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $range;

    /**
     * @ORM\Column(type="simple_array")
     */
    private $components = [];

    /**
     * @ORM\Column(type="text")
     */
    private $material;

    /**
     * @ORM\Column(type="boolean")
     */
    private $ritual;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $duration;

    /**
     * @ORM\Column(type="boolean")
     */
    private $concentration;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $castingTime;

    /**
     * @ORM\Column(type="integer")
     */
    private $level;

    /**
     * @ORM\ManyToOne(targetEntity=CharacterClass::class, inversedBy="spells")
     */
    private $class;

    /**
     * @ORM\ManyToOne(targetEntity=CharacterSubclass::class, inversedBy="spells")
     */
    private $subClass;

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

    public function getHigherLevel(): ?string
    {
        return $this->higherLevel;
    }

    public function setHigherLevel(string $higherLevel): self
    {
        $this->higherLevel = $higherLevel;

        return $this;
    }

    public function getPage(): ?string
    {
        return $this->page;
    }

    public function setPage(string $page): self
    {
        $this->page = $page;

        return $this;
    }

    public function getRange(): ?string
    {
        return $this->range;
    }

    public function setRange(string $range): self
    {
        $this->range = $range;

        return $this;
    }

    public function getComponents(): ?array
    {
        return $this->components;
    }

    public function setComponents(array $components): self
    {
        $this->components = $components;

        return $this;
    }

    public function getMaterial(): ?string
    {
        return $this->material;
    }

    public function setMaterial(string $material): self
    {
        $this->material = $material;

        return $this;
    }

    public function getRitual(): ?bool
    {
        return $this->ritual;
    }

    public function setRitual(bool $ritual): self
    {
        $this->ritual = $ritual;

        return $this;
    }

    public function getDuration(): ?string
    {
        return $this->duration;
    }

    public function setDuration(string $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getConcentration(): ?bool
    {
        return $this->concentration;
    }

    public function setConcentration(bool $concentration): self
    {
        $this->concentration = $concentration;

        return $this;
    }

    public function getCastingTime(): ?string
    {
        return $this->castingTime;
    }

    public function setCastingTime(string $castingTime): self
    {
        $this->castingTime = $castingTime;

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): self
    {
        $this->level = $level;

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

    public function getSubClass(): ?CharacterSubclass
    {
        return $this->subClass;
    }

    public function setSubClass(?CharacterSubclass $subClass): self
    {
        $this->subClass = $subClass;

        return $this;
    }
}
