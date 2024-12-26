<?php

require_once __DIR__ . '/../database.php';

/**
 * cette methode permet de recuperer la liste de des equipement
 * @return returne une liste des equipement
 */
function getAllStudents(): array
{
    global $db;
    $result = pg_query($db, "SELECT * FROM etudiant");
    if (!$result)
        die("Erreur lors de la récupération des étudiants : " . pg_last_error());
    return pg_fetch_all($result, PGSQL_ASSOC);
}


/**
 * cette methode permet de recuperer un etudiant par son id
 * @param $id int id de l'etudiant
 * @return returne un etudiant par son id
 */
function getStudentById($id): array
{
    global $db;
    $result = pg_query($db, "SELECT * FROM etudiant WHERE id=$id");
    if (!$result)
        die("Erreur lors de la récupération de l'étudiant : " . pg_last_error());
    return pg_fetch_assoc($result);
}


/**
 * cette methode permet de creer un nouvel etudiant
 * @param $nom string nom de l'etudiant
 * @param $prenom string prenom de l'etudiant
 * @param $email string email de l'etudiant
 * @param $filiere string filiere de l'etudiant
 * @return void
 */
function createStudent($nom, $prenom, $email, $filiere)
{
    global $db;
    $result = pg_query($db, "INSERT INTO etudiant (nom, prenom, email, filiere) VALUES ('$nom', '$prenom', '$email', '$filiere')");
    if (!$result)
        die("Erreur lors de la création de l'étudiant : " . pg_last_error());
}


/**
 * cette methode permet de modifier un etudiant existant
 * @param $id int id de l'etudiant
 * @param $nom string nom de l'etudiant
 * @return void
 */
function updateStudent($id, $nom, $prenom, $email, $filiere)
{
    global $db;
    $result = pg_query($db, "UPDATE etudiant SET nom='$nom', prenom='$prenom', email='$email', filiere='$filiere' WHERE id=$id");
    if (!$result)
        die("Erreur lors de la modification de l'étudiant : " . pg_last_error());
}

/**
 * cette methode permet de supprimer un etudiant existant
 * @param $id int id de l'etudiant
 * @return void
 */
function deleteStudent($id)
{
    global $db;
    $result = pg_query($db, "DELETE FROM etudiant WHERE id=$id");
    if (!$result)
        die("Erreur lors de la suppression de l'étudiant : ". pg_last_error());
}
