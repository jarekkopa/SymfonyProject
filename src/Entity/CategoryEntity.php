<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryEntityRepository")
 */
class CategoryEntity
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
     * @ORM\ManyToMany(targetEntity="App\Entity\FilmEntity", mappedBy="category")
     */
    private $film;

    /**
     * @ORM\Column(type="boolean")
     */
    private $hidden = true;

    public function __construct()
    {
        $this->film = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->getName();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return "Imie to: $this->name";
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|FilmEntity[]
     */
    public function getFilm(): Collection
    {
        return $this->film;
    }

    public function addFilm(FilmEntity $film): self
    {
        if (!$this->film->contains($film)) {
            $this->film[] = $film;
            $film->addCategory($this);
        }

        return $this;
    }

    public function removeFilm(FilmEntity $film): self
    {
        if ($this->film->contains($film)) {
            $this->film->removeElement($film);
            $film->removeCategory($this);
        }

        return $this;
    }

    public function getHidden(): ?bool
    {
        return $this->hidden;
    }

    public function setHidden(bool $hidden): self
    {
        $this->hidden = $hidden;

        return $this;
    }
}
