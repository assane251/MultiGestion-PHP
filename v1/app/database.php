<?php

$serveur = "localhost";
$port = "5432";
$user = "postgres";
$pwd = "Assane45678";
$dbname = "db-php-v1";

$db = pg_connect("host=$serveur port=$port dbname=$dbname user=$user password=$pwd");

if (!$db) {
    die("Erreur de connexion: " . pg_last_error());
}