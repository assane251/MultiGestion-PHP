<?php

use App\Config\Bootstrap;
use App\Controllers\AnimalController;
use App\Controllers\EquipementController;
use App\Repository\AnimalRepository;
use App\Repository\EquipementRepository;

require_once __DIR__ . '/../vendor/autoload.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'equipement';
$action = isset($_GET['action']) ? $_GET['action'] : 'listTousLesEquipements'; // Action par défaut


// Obtenir la requête actuelle
//$request = Request::createFromGlobals();
//$path = $request->getPathInfo();
//$method = $request->getMethod();
//
//echo "Request: ". $request . "<br><br>" . $path . "<br>" . $method;

// Initialiser le contrôleur
//$animalController = new AnimalController((new \App\Config\Bootstrap())::getEntityManager());
$entityManager = (new Bootstrap())::getEntityManager();

// Routage simple
switch ($controller) {
    case 'animal':
        $animalRepository = new AnimalRepository($entityManager);
        $equipementRepository = new EquipementRepository($entityManager);
        $animalController = new AnimalController($animalRepository, $equipementRepository);
        if (method_exists($animalController, $action)) {
            $response = $animalController->$action();
//            echo $response->send();
            echo $response->getContent();
        }
        else
            die("L'action '$action' n'exite pas");

        break;

    case 'equipement':
        $equipementRepository = new EquipementRepository($entityManager);
        $equipementController = new EquipementController($equipementRepository); // Correct controller
        if (method_exists($equipementController, $action)) {
            $response = $equipementController->$action();
            echo $response->getContent();
        } else {
            die("L'action '$action' n'existe pas");
        }
        break;
        break;

    default:
        echo "Page Not Found";
        break;
}
