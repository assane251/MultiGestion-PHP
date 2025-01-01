<?php

require_once __DIR__ . '/../models/Cours.php';


/**
 * Controller qui affiche la liste des animal
 * @return void
 */
function listCoursController()
{
    $courses = listerTousLesCours();
    require_once  __DIR__ . '/../views/cours/index.php';
}

/**
 * Controller qui affiche les détails d'un cours
 * @return void
 */
function listCoursParId()
{
    $id = $_GET['id'] ?? null;

    if ($id) {
        $course = recupererCoursParId($id); // Récupérer les détails du cours

        if ($course) {
            require_once __DIR__ . '/../views/cours/show.php'; // Inclure la vue des détails
        } else {
            echo "⚠️ Cours introuvable avec cet identifiant.";
        }
    } else {
        echo "⚠️ Aucun identifiant de cours fourni.";
    }
}



/**
 * Controller qui affiche le formulaire d'ajout d'un animal
 * @return void
 */
function ajouterCoursController()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_POST)) {
            extract($_POST);
            ajouterCours($nom_cours, $code_cours, $nombre_heure);

            require_once  __DIR__. '/../views/cours/create.php';
        }
    } else {
        require_once  __DIR__ . '/../views/cours/create.php';
    }
}


/**
 * Controller qui affiche le formulaire de modification d'un animal
 * @param $id int id du animal
 * @return void
 */
function modifierCoursController()
{
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $course = recupererCoursParId($id);
            require_once  __DIR__ . '/../views/cours/edit.php';
        }
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_POST)) {

            extract($_POST);
            modifierCours($id, $nom_cours, $code_cours, $nombre_heure);

            header('Location: index.php?controller=cours&action=listCoursController');

            require_once  __DIR__. '/../views/cours/edit.php';
        }
    }
}

/**
 * Controller qui supprime un animal
 * @param $id int id du animal
 * @return void
 */
function supprimerCoursController()
{
    $id = isset($_GET['id']) ? $_GET['id'] : null;

    if ($id) {
        supprimerCoursParId($id);
        header('Location: index.php?controller=cours&action=listCoursController');
    }
}
