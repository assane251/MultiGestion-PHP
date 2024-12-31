<?php

namespace App\Controllers;

use App\Repository\AnimalRepository;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class AnimalController
{
    private AnimalRepository $animalRepository;
    private Environment $twig;

    public function __construct(AnimalRepository $animalRepository)
    {
        $this->animalRepository = $animalRepository;

        $loader = new FilesystemLoader(__DIR__ . '/../Views');
        $this->twig = new Environment($loader);
    }

    public function index(): Response
    {
        $animals = $this->animalRepository->findAll();

        return new Response(
            $this->twig->render('animal/index.html.twig', ['animals' => $animals]),
            Response::HTTP_OK
        );
    }

    public function show(int $id): Response
    {
        $animal = $this->animalRepository->findById($id);

        if (!$animal) {
            return new Response('Animal not found', Response::HTTP_NOT_FOUND);
        }

        return new Response(
            $this->twig->render('animal/show.html.twig', ['animal' => $animal]),
            Response::HTTP_OK
        );
    }

    public function create(string $type, int $age, string $sante): Response
    {
        $this->animalRepository->create($type, $age, $sante);

        return new Response(
            'Animal created successfully',
            Response::HTTP_CREATED,
            ['Location' => '/animals']
        );
    }

    public function edit(int $id, string $type, int $age, string $sante): Response
    {
        $updated = $this->animalRepository->update($id, $type, $age, $sante);

        if (!$updated) {
            return new Response('Animal not found', Response::HTTP_NOT_FOUND);
        }

        return new Response(
            'Animal updated successfully',
            Response::HTTP_OK,
            ['Location' => '/animals']
        );
    }

    public function delete(int $id): Response
    {
        $deleted = $this->animalRepository->delete($id);

        if (!$deleted) {
            return new Response('Animal not found', Response::HTTP_NOT_FOUND);
        }

        return new Response(
            'Animal deleted successfully',
            Response::HTTP_OK,
            ['Location' => '/animals']
        );
    }
}
