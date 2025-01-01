<?php

namespace App\Repository;

use App\Models\Equipement;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;

class EquipementRepository
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

    public function findById(int $id): ?Equipement
    {
        return $this->entityManager->getRepository(Equipement::class)->find($id);
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function create($nom, $etat, $disponible): void
    {
        $equipement = new Equipement();
        $equipement->setNom($nom);
        $equipement->setEtat($etat);
        $equipement->setDisponible($disponible);

        $this->entityManager->persist($equipement);
        $this->entityManager->flush();
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
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

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
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
