<?php

namespace AlHassane\MultiGestionPHP\Models;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "animal")]
class Animal
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    #[ORM\Column(name: "id", type: "integer")]
    private $id;
    #[ORM\Column(name: "type", type: "string", length: 50)]
    private $type;
    #[ORM\Column(name: "sante", type: "string", length: 50)]
    private $sante;
    #[ORM\ManyToOne(targetEntity: Equipement::class, inversedBy: 'animal')]
    #[ORM\JoinColumn(name: "equipement_id", referencedColumnName: "id")]
    private Collection|null $equipement_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getType(): ?string
    {
        return $this->type;
    }
    public function getSante(): ?string
    {
        return $this->sante;
    }
    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }
    public function setSante(string $sante): self
    {
        $this->sante = $sante;
        return $this;
    }
}