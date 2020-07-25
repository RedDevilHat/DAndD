<?php

namespace App\Entity;

use App\Repository\CharacterClassFeaturesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CharacterClassFeaturesRepository::class)
 */
class CharacterClassFeatures
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
    private $level;

    /**
     * @ORM\ManyToOne(targetEntity=CharacterClass::class, inversedBy="characterClassFeatures")
     * @ORM\JoinColumn(nullable=false)
     */
    private $class;

    /**
     * @ORM\Column(type="text")
     */
    private $descriptoin;

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

    public function getDescriptoin(): ?string
    {
        return $this->descriptoin;
    }

    public function setDescriptoin(string $descriptoin): self
    {
        $this->descriptoin = $descriptoin;

        return $this;
    }
}
