<?php

namespace App\Controllers;

use App\Repository\AnimalRepository;
use App\Repository\EquipementRepository;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

class AnimalController
{
    private AnimalRepository $animalRepository;
    private EquipementRepository $equipementRepository;
    private Environment $twig;

    public function __construct(AnimalRepository     $animalRepository,
                                EquipementRepository $equipementRepository)
    {
        $this->animalRepository = $animalRepository;
        $this->equipementRepository = $equipementRepository;

        $loader = new FilesystemLoader(__DIR__ . '/../Views');
        $this->twig = new Environment($loader);
    }

    public function listTousLesAnimaux(): Response
    {
        $animals = $this->animalRepository->findAll();

        $content = $this->twig->render('animal/index.html.twig', ['animals' => $animals]);
        return new Response($content, Response::HTTP_OK);
    }

    /**
     * @throws OptimisticLockException
     * @throws SyntaxError
     * @throws ORMException
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function listAnimalParId(): Response
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            extract($_POST);
            // Validation des données
            if (!$type ||!$age ||!$sante ||!$equipement_id) {
                return new Response(
                    'Missing required fields.',
                    Response::HTTP_BAD_REQUEST
                );
            }

            $eqipementParId = $this->equipementRepository->findById($equipement_id);

            $this->animalRepository->update($id, $type, $age, $sante, $eqipementParId ?? null);

            return new Response(
                header('Location: index.php?controller=animal&action=listTousLesAnimaux'),
                Response::HTTP_OK,
            );
        }

        $id = $_GET['id'] ?? null;

        // Validate the id
        if (!$id || !is_numeric($id)) {
            return new Response("Invalid or missing ID parameter", Response::HTTP_BAD_REQUEST);
        }

        $animals = $this->animalRepository->findById((int)$id);

        if (!$animals) {
            return new Response("Animal n'existe pas", Response::HTTP_NOT_FOUND);
        } else {
            return new Response(
                $this->twig->render('animal/show.html.twig', ['animal' => $animals,
                    'equipements' => $this->equipementRepository->findAll()]),
                Response::HTTP_OK
            );
        }
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function ajouterAnimal(): Response
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            extract($_POST);

            // Validation des données
            if (!$type || !$age || !$sante || !$equipement_id) {
                return new Response(
                    'Missing required fields.',
                    Response::HTTP_BAD_REQUEST
                );
            }

            $eqipementParId = $this->equipementRepository->findById($equipement_id);

            $this->animalRepository->create($type, $age, $sante, $eqipementParId);

            return new Response(
                $this->twig->render('animal/create.html.twig', (array)'Animal cree avec success'),
                Response::HTTP_CREATED,
            );
        }

        $equipements = $this->equipementRepository->findAll();
        return new Response(
            $this->twig->render('animal/create.html.twig', ['equipements' => $equipements]),
            Response::HTTP_OK
        );
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function modifierAnimal(): Response
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            extract($_POST);

            // Validation des données
            if (!$type || !$age || !$sante) {
                return new Response(
                    'Missing required fields.',
                    Response::HTTP_BAD_REQUEST
                );
            }
            $equipementParId = $this->equipementRepository->findById($equipement_id);


            $updated = $this->animalRepository->update($id, $type, $age, $sante, $equipementParId ?? null);

            if (!$updated) {
                return new Response("Animal n'existe pas", Response::HTTP_NOT_FOUND);
            }

            return new Response(
                header('Location: index.php?controller=animal&action=listTousLesAnimaux'),
            Response::HTTP_OK
            );
        }

        /** @var integer $id */
        $id = $_GET['id'];
        $animal = $this->animalRepository->findById($id);

        if (!$animal) {
            return new Response("Animal n'existe pas", Response::HTTP_NOT_FOUND);
        } else {
            return new Response(
                $this->twig->render('animal/edit.html.twig', ['animal' => $animal,
                    'equipements' => $this->equipementRepository->findAll()]),
                Response::HTTP_OK
            );
        }
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function supprimerAnimal(): Response
    {
        $id = $_GET['id'];
        $deleted = $this->animalRepository->delete($id);

        if (!$deleted) {
            return new Response("Animal n'existe pas", Response::HTTP_NOT_FOUND);
        }

        return new Response(
            header('Location: index.php?controller=animal&action=listTousLesAnimaux'),
        Response::HTTP_OK,
        );
    }
}
