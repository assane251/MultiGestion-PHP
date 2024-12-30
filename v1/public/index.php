<?php

require_once "../app/controllers/CoursController.php";
require_once "../app/controllers/EtudiantController.php";

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'etudiant';
$action = isset($_GET['action']) ? $_GET['action'] : 'listEtudiantsController';

switch ($controller) {
    case 'cours':
        require_once '../app/controllers/CoursController.php';
        break;
    case 'etudiant':
        require_once '../app/controllers/EtudiantController.php';
        break;
    default:
        http_response_code(404);
        include('404.php');
        exit;
}

if (function_exists($action)) {
    $action();
} else {
    http_response_code(404);
    include('404.php');
    exit;
}