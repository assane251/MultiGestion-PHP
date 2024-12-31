<?php

namespace App\Models;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "animal")]
class Animal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(type: "string")]
    private string $type;

    #[ORM\Column(type: "integer")]
    private int $age;

    #[ORM\Column(type: "string")]
    private string $sante;

    #[ORM\ManyToOne(targetEntity: Equipement::class, inversedBy: "animals")]
    #[ORM\JoinColumn(name: "equipement_id", referencedColumnName: "id", nullable: true)]
    private ?Equipement $equipement = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getSante(): ?string
    {
        return $this->sante;
    }

    public function setType(string $type)
    {
        $this->type = $type;
        return $this;
    }

    public function setAge($age)
    {
        $this->age = $age;
        return $this;
    }

    public function setSante(string $sante)
    {
        $this->sante = $sante;
        return $this;
    }

    public function getEquipement(): ?Equipement
    {
        return $this->equipement;
    }

    public function setEquipement(?Equipement $equipement)
    {
        $this->equipement = $equipement;
        return $this;
    }
}