<?php

require_once __DIR__ . '/../database.php';

/**
 * cette methode permet de recuperer la liste de des animal
 * @return returne une liste des animal
 */
function getAllCourses(): array
{
    global $db;
    $result = pg_query($db, "SELECT * FROM animal");
    if (!$result)
        die("Erreur lors de la récupération des animal : " . pg_last_error());
    return pg_fetch_all($result, PGSQL_ASSOC);
}


/**
 * cette methode permet de recuperer un animal par son id
 * @param $id int id du animal
 * @return returne un animal par son id
 */
function getCourseById($id): array
{
    global $db;
    $result = pg_query($db, "SELECT * FROM animal WHERE id=$id");
    if (!$result)
        die("Erreur lors de la récupération du animal : " . pg_last_error());
    return pg_fetch_assoc($result);
}


/**
 * cette methode permet de creer un nouveau animal
 * @param $titre string titre du animal
 * @param $nom_cours string nom du animal
 * @param $nom_nom_cours int nombre du animal
 * @return void
 */
function createCourse($nom_cours, $nombre_heure)
{
    global $db;
    $result = pg_query($db, "INSERT INTO animal (nom_cours, nombre_heure) VALUES ('$nom_cours', $nombre_heure)");
    if (!$result)
        die("Erreur lors de la création du animal : " . pg_last_error());
}


/**
 * cette methode permet de modifier un animal existant
 * @param $id int id du animal
 * @param $nom_cours string nom du animal
 * @param $nombre_heure int nombre du animal
 * @return void retourne rien
 */
function updateCourse($id, $nom_cours, $nombre_heure)
{
    global $db;
    $result = pg_query($db, "UPDATE animal SET nom_cours='$nom_cours', nombre_heure=$nombre_heure WHERE id=$id");
    if (!$result)
        die("Erreur lors de la modification du animal : " . pg_last_error());
}

/**
 * cette methode permet de supprimer un animal existant
 * @param $id int id du animal
 * @return void retourne rien
 */
function deleteCourse($id)
{
    global $db;
    $result = pg_query($db, "DELETE FROM animal WHERE id=$id");
    if (!$result)
        die("Erreur lors de la suppression du animal : " . pg_last_error());
}