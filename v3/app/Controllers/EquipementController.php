<?php

namespace App\Controllers;

use App\Repository\EquipementRepository;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

class EquipementController
{
    private EquipementRepository $equipementRepository;
    private Environment $twig;

    public function __construct(EquipementRepository $equipementRepository)
    {
        $this->equipementRepository = $equipementRepository;

        $loader = new FilesystemLoader(__DIR__ . '/../Views');
        $this->twig = new Environment($loader);
    }

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function index(): Response
    {
        $equipements = $this->equipementRepository->findAll();


        return new Response(
            $this->twig->render(
                'equipement/index.html.twig',
                ['equipements' => $equipements]
            ),
            Response::HTTP_OK
        );
    }

    public function show(int $id): Response
    {
        $equipement = $this->equipementRepository->findById($id);

        if (!$equipement) {
            return new Response('Equipement not found', Response::HTTP_NOT_FOUND);
        }

        return new Response(
            $this->twig->render(
                'equipement/show.html.twig',
                ['equipement' => $equipement]
            ),
            Response::HTTP_OK
        );
    }

    public function create(string $nom, string $etat, bool $disponible): Response
    {
        $this->equipementRepository->create($nom, $etat, $disponible);

        return new Response(
            'Equipement created successfully',
            Response::HTTP_CREATED,
            ['Location' => '/equipements']
        );
    }

    public function edit(int $id, string $nom, string $etat, bool $disponible): Response
    {
        $updated = $this->equipementRepository->update($id, $nom, $etat, $disponible);

        if (!$updated) {
            return new Response('Equipement not found', Response::HTTP_NOT_FOUND);
        }

        return new Response(
            'Equipement updated successfully',
            Response::HTTP_OK,
            ['Location' => '/equipements']
        );
    }

    public function delete(int $id): Response
    {
        $deleted = $this->equipementRepository->delete($id);

        if (!$deleted) {
            return new Response('Equipement not found', Response::HTTP_NOT_FOUND);
        }

        return new Response(
            'Equipement deleted successfully',
            Response::HTTP_OK,
            ['Location' => '/equipements']
        );
    }

}