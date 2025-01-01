<?php

require_once __DIR__ . '/../models/Etudiant.php';

/**
 * Controller qui affiche la liste des étudiants
 * @return void
 */
function listEtudiantsController()
{
    $etudiants = listerTousLesEtudiant();
    require_once  __DIR__ . '/../views/etudiants/index.php';
}

/**
 * Controller qui affiche les détails d'un étudiant
 * @return void
 */
function listEtudiantParId()
{
    $id = $_GET['id'] ?? null;
    if ($id) {
        $etudiant = recupererEtudiantParId($id);
        require_once __DIR__ . '/../views/etudiants/show.php';
    } else {
        header('Location: index.php?controller=etudiant&action=listEtudiantsController');
    }
}




/**
 * Controller qui affiche le formulaire de création d'un étudiant
 * @return void
 */
function ajouterEtudiantController()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_POST)) {
            extract($_POST);
            ajouterEtudiant($nom, $prenom, $email, $filiere);

            require_once  __DIR__. '/../views/etudiants/create.php';
        }
    } else {
        require_once  __DIR__. '/../views/etudiants/create.php';
    }
}


/**
 * Controller qui affiche le formulaire de modification d'un étudiant
 * @param $id int id de l'étudiant
 * @return void
 */
function modifierEtudiantController()
{
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $etudiant = recupererEtudiantParId($id);
            require_once  __DIR__. '/../views/etudiants/edit.php';
        }
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_POST)) {

            extract($_POST);
            modifierEtuiant($id, $nom, $prenom, $email, $filiere);

            header('Location: index.php?controller=etudiant&action=listEtudiantsController');

            require_once  __DIR__. '/../views/etudiants/edit.php';
        }
    }
}

/**
 * Controller qui supprime un étudiant
 * @param $id int id de l'étudiant
 * @return void
 */
function supprimerEtudiantController()
{
    $id = isset($_GET['id'])? $_GET['id'] : null;

    if ($id) {
        supprimerEtudiantParId($id);
        header('Location: index.php?controller=etudiant&action=listEtudiantsController');
    }
}
