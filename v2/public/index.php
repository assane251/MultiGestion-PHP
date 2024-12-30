<?php

require_once "../app/controllers/RendezVousController.php";
require_once "../app/controllers/ClientController.php";

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'client';
$action = isset($_GET['action']) ? $_GET['action'] : 'listClientsController';

switch ($controller) {
    case 'rendezvous':
        $rendezvousController = new RendezVousController();
        if (method_exists($rendezvousController, $action))
            $rendezvousController->$action();
        else
            die("L'action '$action' n'existe pas.");

        break;
    case 'client':
        $clientController = new ClientController();
        if (method_exists($clientController, $action))
            $clientController->$action();
        else
            die("L'action '$action' n'existe pas.");

        break;
    default:
        die("Le contrôleur '$controller' n'existe pas.");
}