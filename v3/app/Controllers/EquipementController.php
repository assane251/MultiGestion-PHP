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

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function show(): Response
    {
        $id = $_GET['id'] ?? null;
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

    public function create(): Response
    {
       if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           // Récupère les données du formulaire
           $nom = $_POST['nom'] ?? null;
           $etat = $_POST['etat'] ?? null;
           $disponible = bool($_POST['disponible']);

           // Validation des données
           if (!$nom || !$etat || $disponible === null) {
               return new Response(
                   'Missing required fields.',
                   Response::HTTP_BAD_REQUEST
               );
           }

           $this->equipementRepository->create($nom, $etat, $disponible);

           return new Response(
               'Equipement created successfully',
               Response::HTTP_CREATED,
//               ['Location' => '/equipements']
           );
       }

        return new Response(
            $this->twig->render('equipement/create.html.twig'),
            Response::HTTP_OK
        );
    }

    public function edit(): Response
    {
        extract($_POST);
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

    public function delete(): Response
    {
        $id = $_GET['id'] ?? null;
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