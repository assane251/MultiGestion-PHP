<?php

require_once __DIR__ . '/../database.php';
require_once __DIR__ . '/../models/Client.php';

class ClientController
{
    private Client $clientModel;

    public function __construct()
    {
        $this->clientModel = new Client(Database::getInstance());
    }

    public function listClientsController()
    {
        $clients = $this->clientModel->listTousLesClients();
        require_once __DIR__ . '/../views/clients/index.php';
    }

    public function ajouterClientController()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST)) {
                $this->clientModel->setNom($_POST['nom']);
                $this->clientModel->setPrenom($_POST['prenom']);
                $this->clientModel->setEmail($_POST['email']);
                $this->clientModel->setTelephone($_POST['telephone']);
                $this->clientModel->ajouterClient();

                header('Location: ?controller=client&action=listClientsController');
                exit;
            }
        } else {
            require_once __DIR__ . '/../views/clients/create.php';
        }
    }

    public function showClientController()
    {
        // Récupérer l'ID du client passé en paramètre de l'URL
        $id = $_GET['id'] ?? null;

        if ($id) {
            // Récupérer les détails du client à partir du modèle
            $client = $this->clientModel->recupererClientParId($id);
            // Charger la vue pour afficher les détails du client
            require_once __DIR__ . '/../views/clients/show.php';
        } else {
            // Si l'ID n'est pas valide, rediriger vers la liste des clients
            header('Location: ?controller=client&action=listClientsController');
            exit;
        }
    }


    public function modifierClientController()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST)) {
                $this->clientModel->setId($_POST['id']);
                $this->clientModel->setNom($_POST['nom']);
                $this->clientModel->setPrenom($_POST['prenom']);
                $this->clientModel->setEmail($_POST['email']);
                $this->clientModel->setTelephone($_POST['telephone']);
                $this->clientModel->modifierClient();

                header('Location: ?controller=client&action=listClientsController');
                exit;
            }
        } else {
            $id = $_GET['id'] ?? null;
            $client = $this->clientModel->recupererClientParId($id);
            require_once __DIR__ . '/../views/clients/edit.php';
        }
    }

    public function supprimerClientController()
    {
        $id = $_GET['id'] ?? null;

        if ($id) {
            $this->clientModel->supprimerClient($id);
            header('Location: ?controller=client&action=listClientsController');
            exit;
        }
    }
}