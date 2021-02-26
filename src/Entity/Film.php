<?php

namespace App\Entity;

use App\Repository\FilmRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FilmRepository::class)
 */
class Film
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $Tittle;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $Description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Director;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $Picture;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $TrailerLink;

    /**
     * @ORM\OneToMany(targetEntity=Category::class, mappedBy="Films")
     */
    private $Category;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="Films")
     */
    private $User;

    public function __construct()
    {
        $this->Category = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTittle(): ?string
    {
        return $this->Tittle;
    }

    public function setTittle(string $Tittle): self
    {
        $this->Tittle = $Tittle;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getDirector(): ?string
    {
        return $this->Director;
    }

    public function setDirector(string $Director): self
    {
        $this->Director = $Director;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->Picture;
    }

    public function setPicture(string $Picture): self
    {
        $this->Picture = $Picture;

        return $this;
    }

    public function getTrailerLink(): ?string
    {
        return $this->TrailerLink;
    }

    public function setTrailerLink(string $TrailerLink): self
    {
        $this->TrailerLink = $TrailerLink;

        return $this;
    }

    /**
     * @return Collection|Category[]
     */
    public function getCategory(): Collection
    {
        return $this->Category;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->Category->contains($category)) {
            $this->Category[] = $category;
            $category->setFilms($this);
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        if ($this->Category->removeElement($category)) {
            // set the owning side to null (unless already changed)
            if ($category->getFilms() === $this) {
                $category->setFilms(null);
            }
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }
}
