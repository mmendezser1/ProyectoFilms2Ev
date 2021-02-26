<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
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
    private $Gmail;

    /**
     * @ORM\Column(type="string", length=400)
     */
    private $Username;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $Password;

    /**
     * @ORM\OneToMany(targetEntity=Film::class, mappedBy="User")
     */
    private $Films;

    public function __construct()
    {
        $this->Films = new ArrayCollection();
    }

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

    public function getGmail(): ?string
    {
        return $this->Gmail;
    }

    public function setGmail(string $Gmail): self
    {
        $this->Gmail = $Gmail;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->Username;
    }

    public function setUsername(string $Username): self
    {
        $this->Username = $Username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->Password;
    }

    public function setPassword(string $Password): self
    {
        $this->Password = $Password;

        return $this;
    }

    /**
     * @return Collection|Film[]
     */
    public function getFilms(): Collection
    {
        return $this->Films;
    }

    public function addFilm(Film $film): self
    {
        if (!$this->Films->contains($film)) {
            $this->Films[] = $film;
            $film->setUser($this);
        }

        return $this;
    }

    public function removeFilm(Film $film): self
    {
        if ($this->Films->removeElement($film)) {
            // set the owning side to null (unless already changed)
            if ($film->getUser() === $this) {
                $film->setUser(null);
            }
        }

        return $this;
    }
}
