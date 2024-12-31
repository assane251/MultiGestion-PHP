<?php

require_once __DIR__ . '/../database.php';

/**
 * cette methode permet de recuperer la liste de des cours
 * @return returne une liste des animal
 */
function listerTousLesCours(): array
{
    global $db;
    $result = pg_query($db, "SELECT * FROM cours");
    if (!$result)
        die("Erreur lors de la récupération des animal : " . pg_last_error());
    return pg_fetch_all($result, PGSQL_ASSOC);
}


/**
 * cette methode permet de recuperer un cours par son id
 * @param $id int id du cours
 * @return returne un animal par son id
 */
function recupererCoursParId($id): array
{
    global $db;
    $result = pg_query($db, "SELECT * FROM cours WHERE id=$id");
    if (!$result)
        die("Erreur lors de la récupération du animal : " . pg_last_error());
    return pg_fetch_assoc($result);
}


/**
 * cette methode permet de creer un nouveau cours
 * @param $titre string titre du cours
 * @param $nom_cours string nom du cours
 * @param $nom_nom_cours int nombre du cours
 * @return void
 */
function ajouterCours($nom_cours, $code_cours, $nombre_heure)
{
    global $db;
    $result = pg_query($db, "INSERT INTO cours (nom_cours, nombre_heure, code_cours) VALUES ('$nom_cours', $nombre_heure, '$code_cours')");
    if (!$result)
        die("Erreur lors de la création du animal : " . pg_last_error());
}


/**
 * cette methode permet de modifier un animal existant
 * @param $id int id du cours
 * @param $nom_cours string nom du cours
 * @param $nombre_heure int nombre du cours
 * @return void retourne rien
 */
function modifierCours($id, $nom_cours, $code_cours, $nombre_heure)
{
    global $db;
    $result = pg_query($db, "UPDATE cours SET nom_cours='$nom_cours', nombre_heure=$nombre_heure, code_cours='$code_cours' WHERE id=$id");
    if (!$result)
        die("Erreur lors de la modification du animal : " . pg_last_error());
}

/**
 * cette methode permet de supprimer un cours existant
 * @param $id int id du cours
 * @return void retourne rien
 */
function supprimerCoursParId($id)
{
    global $db;
    $result = pg_query($db, "DELETE FROM cours WHERE id=$id");
    if (!$result)
        die("Erreur lors de la suppression du animal : " . pg_last_error());
}