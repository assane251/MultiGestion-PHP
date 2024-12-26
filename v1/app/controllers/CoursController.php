<?php

require_once __DIR__ . '/../models/Cours.php';


/**
 * Controller qui affiche la liste des animal
 * @return void
 */
function listCoursesController()
{
    $courses = getAllCourses();
    require_once  __DIR__ . '/../views/cours/show.php';
}


/**
 * Controller qui affiche le formulaire d'ajout d'un animal
 * @return void
 */
function addCourseController()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_POST)) {
            extract($_POST);
            createCourse($nom_cours, $nombre_heure);

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
function editCourseController()
{
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $course = getCourseById($id);
            require_once  __DIR__ . '/../views/cours/edit.php';
        }
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_POST)) {

            extract($_POST);
            updateCourse($id, $nom_cours, $nombre_heure);

            header('Location: index.php?controller=animal&action=listCoursesController');

            require_once  __DIR__. '/../views/cours/edit.php';
        }
    }
}

/**
 * Controller qui supprime un animal
 * @param $id int id du animal
 * @return void
 */
function deleteCourseController()
{
    $id = isset($_GET['id']) ? $_GET['id'] : null;

    if ($id) {
        deleteCourse($id);
        header('Location: index.php?controller=animal&action=listCoursesController');
    }
}
