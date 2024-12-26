<?php

require_once "../app/controllers/AnimalController.php";
require_once "../app/controllers/EquipementController.php";
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/config/bootstap.php';

use AlHassane\MultiGestionPHP\Controllers\AnimalController;

// Exécution d'une action dans le contrôleur, en capturant les erreurs
try {
    // Assurez-vous que vous appelez la méthode qui fait une interaction avec la base
    $animalController = new AnimalController();
    $animalController->index();  // Remplacez par votre méthode spécifique

} catch (\Doctrine\DBAL\Exception $e) {
    echo "Database error: " . $e->getMessage();
    // Vous pouvez aussi loguer l'erreur ici pour mieux la suivre
} catch (\Exception $e) {
    echo "An error occurred: " . $e->getMessage();
}

//$controller = isset($_GET['controller']) ? $_GET['controller'] : 'equipement';
//$action = isset($_GET['action']) ? $_GET['action'] : 'listClientsController';

//switch ($controller) {
//    case 'animal':
//        $rendezvousController = new AnimalController();
//        if (method_exists($rendezvousController, $action)) {
//            $rendezvousController->$action();
//        } else {
//            die("L'action '$action' n'existe pas.");
//        }
//        break;
//    case 'client':
//        $clientController = new EquipementController();
//        if (method_exists($clientController, $action)) {
//            $clientController->$action();
//        } else {
//            die("L'action '$action' n'existe pas.");
//        }
//        break;
//    default:
//        die("Le contrôleur '$controller' n'existe pas.");
//}