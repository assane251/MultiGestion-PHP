<?php

namespace App\Models;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "equipment")]
class Equipement
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(type: "string", length: 50)]
    private string $nom;

    #[ORM\Column(type: "string", length: 50)]
    private string $etat;

    #[ORM\Column(type: "boolean")]
    private bool $disponible;

    #[ORM\OneToMany(targetEntity: Animal::class, mappedBy: "equipement")]
    private Collection $animals;

    public function __construct()
    {
        $this->animals = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom)
    {
        $this->nom = $nom;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat)
    {
        $this->etat = $etat;
    }

    public function getDisponible(): ?bool
    {
        return $this->disponible;
    }

    public function setDisponible(bool $disponible)
    {
        $this->disponible = $disponible;
    }

    public function getAnimals(): Collection
    {
        return $this->animals;
    }

    public function addAnimal(Animal $animal)
    {
        if (!$this->animals->contains($animal)) {
            $this->animals[] = $animal;
            $animal->setEquipement($this);
        }
        return $this;
    }

    public function removeAnimal(Animal $animal)
    {
        if ($this->animals->removeElement($animal)) {
            if ($animal->getEquipement() === $this) {
                $animal->setEquipement(null);
            }
        }
        return $this;
    }
}