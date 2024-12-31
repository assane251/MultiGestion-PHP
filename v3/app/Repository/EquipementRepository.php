<?php

namespace App\Repository;

use App\Models\Equipement;
use Doctrine\ORM\EntityManager;

class EquipementRepository extends \App\Repository\AnimalRepository
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function findAll(): array
    {
        return $this->entityManager->getRepository(Equipement::class)->findAll();
    }

    public function findById(int $id): ?\App\Models\Animal
    {
        return $this->entityManager->getRepository(Equipement::class)->find($id);
    }

    public function create($nom, $etat, $disponible): void
    {
        $equipement = new Equipement();
        $equipement->setNom($nom);
        $equipement->setEtat($etat);
        $equipement->setDisponible($disponible);

        $this->entityManager->persist($equipement);
        $this->entityManager->flush();
    }

    public function update($id, $nom, $etat, $disponible): bool
    {
        $equipement = $this->findById($id);

        if (!$equipement) {
            return false;
        }

        $equipement->setNom($nom);
        $equipement->setEtat($etat);
        $equipement->setDisponible($disponible);

        $this->entityManager->flush();

        return true;
    }

    public function delete(int $id): bool
    {
        $equipement = $this->findById($id);

        if (!$equipement) {
            return false;
        }

        $this->entityManager->remove($equipement);
        $this->entityManager->flush();

        return true;
    }
}
