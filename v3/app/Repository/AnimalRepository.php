<?php

namespace App\Repository;

use App\Models\Animal;
use Doctrine\ORM\EntityManager;

class AnimalRepository
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function findAll(): array
    {
        //return $this->entityManager->getRepository(Animal::class)->findAll();
        return [
            ['id' => 1, 'type' => 'Chat', 'age' => 2, 'sante' => 'Bonne'],
            ['id' => 2, 'type' => 'Chien', 'age' => 4, 'sante' => 'Excellente'],
        ];
    }

    public function findById(int $id): ?Animal
    {
        return $this->entityManager->getRepository(Animal::class)->find($id);
    }

    public function create(string $type, int $age, string $sante): void
    {
        $animal = new Animal();
        $animal->setType($type);
        $animal->setAge($age);
        $animal->setSante($sante);

        $this->entityManager->persist($animal);
        $this->entityManager->flush();
    }

    public function update(int $id, string $type, int $age, string $sante): bool
    {
        $animal = $this->findById($id);

        if (!$animal) {
            return false;
        }

        $animal->setType($type);
        $animal->setAge($age);
        $animal->setSante($sante);

        $this->entityManager->flush();

        return true;
    }

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
