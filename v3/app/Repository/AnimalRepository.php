<?php

namespace App\Repository;

use App\Models\Animal;
use App\Models\Equipement;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;

class AnimalRepository
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function findAll(): array
    {
        return $this->entityManager->getRepository(Animal::class)->findAll();
    }

    public function findById(int $id): ?Animal
    {
        return $this->entityManager->getRepository(Animal::class)->find($id);
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function create(string $type, int $age, string $sante, $equipement_id): void
    {
        $animal = new Animal();
        $animal->setType($type);
        $animal->setAge($age);
        $animal->setSante($sante);
        $animal->setEquipement($equipement_id);

        $this->entityManager->persist($animal);
        $this->entityManager->flush();
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function update(int $id, string $type, int $age, string $sante, Equipement $equipement_id): bool
    {
        $animal = $this->findById($id);

        if (!$animal) {
            return false;
        }

        $animal->setType($type);
        $animal->setAge($age);
        $animal->setSante($sante);
        $animal->setEquipement($equipement_id);

        $this->entityManager->flush();

        return true;
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function delete(int $id): bool
    {
        $animal = $this->findById($id);

        if (!$animal) {
            return false;
        }

        $this->entityManager->remove($animal);
        $this->entityManager->flush();

        return true;
    }
}
