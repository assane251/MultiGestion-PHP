<?php

namespace App\Models;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "equipements")]
class Equipement
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    #[ORM\Column(name: "id", type: "integer")]
    private $id;
    #[ORM\Column(name: "etat", type: "string", length: 50)]
    private $etat;
    #[ORM\Column(name: "disponible", type: "boolean")]
    private $disponible;
    #[ORM\OneToMany(targetEntity: Animal::class, mappedBy: 'equipement_id')]
    private Animal|null $animal = null;
    public function getId(): ?int
    {
        return $this->id;
    }
    public function getEtat(): ?string
    {
        return $this->etat;
    }
    public function getDisponible(): ?bool
    {
        return $this->disponible;
    }
    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }
    public function setDisponible(bool $disponible): self
    {
        $this->disponible = $disponible;

        return $this;
    }
}