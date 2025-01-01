<?php

namespace App\Controllers;

use App\Repository\EquipementRepository;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
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
    public function listTousLesEquipements(): Response
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
    public function listEquipementParId(): Response
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            extract($_POST);

            // Validation des données
            if (!$nom || !$etat || $disponible === null) {
                return new Response(
                    'Missing required fields.',
                    Response::HTTP_BAD_REQUEST
                );
            }

            $this->equipementRepository->update($id, $nom, $etat, (bool)$disponible);

            return new Response(
                header('Location: index.php?controller=equipement&action=listTousLesEquipements'),
                Response::HTTP_OK,
            );
        }

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

    /**
     * @throws OptimisticLockException
     * @throws SyntaxError
     * @throws ORMException
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function ajouterEquipement(): Response
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupère les données du formulaire
            $nom = $_POST['nom'] ?? null;
            $etat = $_POST['etat'] ?? null;
            $disponible = $_POST['disponible'];

            // Validation des données
            if (!$nom || !$etat || $disponible === null) {
                return new Response(
                    'Missing required fields.',
                    Response::HTTP_BAD_REQUEST
                );
            }

            $this->equipementRepository->create($nom, $etat, (bool)$disponible);

            return new Response(
                $this->twig->render('equipement/create.html.twig', (array)'Equipement created successfully'),
                Response::HTTP_CREATED,
                ['Location' => '/equipement/index.html.twig']
            );
        }

        return new Response(
            $this->twig->render('equipement/create.html.twig'),
            Response::HTTP_OK
        );
    }

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function modifierEquipement(): Response
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            extract($_POST);

            // Validation des données
            if (!$nom || !$etat || $disponible === null) {
                return new Response(
                    'Missing required fields.',
                    Response::HTTP_BAD_REQUEST
                );
            }

            $updated = $this->equipementRepository->update($id, $nom, $etat, (bool) $disponible);

            if (!$updated) {
                return new Response('Équipement introuvable', Response::HTTP_NOT_FOUND);
            }

            return new  Response(
                header('Location: index.php?controller=equipement&action=listTousLesEquipements'),
                Response::HTTP_OK
            );
        }

        $id = $_GET['id'] ?? null;
        $equipement = $this->equipementRepository->findById($id);

        if (!$equipement) {
            return new Response('Équipement introuvable', Response::HTTP_NOT_FOUND);
        }

        return new Response(
            $this->twig->render('equipement/edit.html.twig', ['equipement' => $equipement]),
            Response::HTTP_OK
        );
    }


    /**
     * @throws OptimisticLockException
     * @throws SyntaxError
     * @throws ORMException
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function supprimerEquipement(): Response
    {
        $id = $_GET['id'] ?? null;
        $deleted = $this->equipementRepository->delete($id);

        if (!$deleted) {
            return new Response('Equipement not found', Response::HTTP_NOT_FOUND);
        }

        return new Response(
            header('Location: index.php?controller=equipement&action=listTousLesEquipements'),
            Response::HTTP_OK,
        );
    }

}