<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Config\Bootstrap;
use App\Controllers\AnimalController;
use App\Controllers\EquipementController;
use App\Repository\AnimalRepository;
use App\Repository\EquipementRepository;

// Obtenir l'EntityManager
$entityManager = (new Bootstrap())::getEntityManager();

// Déterminer le contrôleur et l'action à partir des paramètres GET
$controllerName = $_GET['controller'] ?? 'animal';
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

try {
    switch ($controllerName) {
        case 'animal':
            $animalRepository = new AnimalRepository($entityManager);
            $animalController = new AnimalController($animalRepository);

            if (method_exists($animalController, $action)) {
                $animalController->$action($id);
            } else {
                throw new Exception("Action non trouvée : $action");
            }
            break;

        case 'equipement':
            $equipementRepository = new EquipementRepository($entityManager);
            $equipementController = new EquipementController($equipementRepository);

            if (method_exists($equipementController, $action)) {
                $equipementController->$action($id);
            } else {
                throw new Exception("Action non trouvée : $action");
            }
            break;

        default:
            http_response_code(404);
            echo "Page introuvable.";
            break;
    }
} catch (Exception $e) {
    http_response_code(500);
    echo "Erreur : " . $e->getMessage();
}