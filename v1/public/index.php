<?php

require_once "../app/controllers/CoursController.php";
require_once "../app/controllers/EtudiantController.php";

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'equipement';
$action = isset($_GET['action']) ? $_GET['action'] : 'listEtudiantsController';

switch ($controller) {
    case 'animal':
        require_once '../app/controllers/CoursController.php';
        break;
    case 'equipement':
        require_once '../app/controllers/EtudiantController.php';
        break;
    default:
        die("Le contrôleur '$controller' n'existe pas.");
}

if (function_exists($action)) {
    $action();
} else{
    die("L'action '$action' n'existe pas dans le contrôleur '$controller'.");
}