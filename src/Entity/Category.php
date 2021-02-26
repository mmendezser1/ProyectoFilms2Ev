<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Name;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $Description;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $Picture;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $Examples;

    /**
     * @ORM\ManyToOne(targetEntity=Film::class, inversedBy="Category")
     */
    private $Films;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

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

    public function getPicture(): ?string
    {
        return $this->Picture;
    }

    public function setPicture(string $Picture): self
    {
        $this->Picture = $Picture;

        return $this;
    }

    public function getExamples(): ?string
    {
        return $this->Examples;
    }

    public function setExamples(string $Examples): self
    {
        $this->Examples = $Examples;

        return $this;
    }

    public function getFilms(): ?Film
    {
        return $this->Films;
    }

    public function setFilms(?Film $Films): self
    {
        $this->Films = $Films;

        return $this;
    }
}
