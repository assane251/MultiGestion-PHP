<?php

require_once __DIR__ . '/../database.php';
require_once __DIR__ . '/../models/Client.php';

class ClientController
{
    private $clientModel;

    public function __construct()
    {
        $this->clientModel = new Equipement(Database::getInstance());
    }

    public function listClientsController()
    {
        $clients = $this->clientModel->getAllClients();
        require_once __DIR__ . '/../views/clients/show.php';
    }

    public function addClientController()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST)) {
                $this->clientModel->setNom($_POST['name']);
                $this->clientModel->setEtat($_POST['email']);
                $this->clientModel->setDisponible($_POST['phone']);
                $this->clientModel->addClient();

                header('Location: ?controller=client&action=listClientsController');
                exit;
            }
        } else {
            require_once __DIR__ . '/../views/clients/create.php';
        }
    }

    public function editClientController()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST)) {
                $this->clientModel->setId($_POST['id']);
                $this->clientModel->setNom($_POST['name']);
                $this->clientModel->setEtat($_POST['email']);
                $this->clientModel->setDisponible($_POST['phone']);
                $this->clientModel->updateClient();

                header('Location: ?controller=client&action=listClientsController');
                exit;
            }
        } else {
            $id = $_GET['id'] ?? null;
            $client = $this->clientModel->getClientById($id);
            require_once __DIR__ . '/../views/clients/edit.php';
        }
    }

    public function deleteClientController()
    {
        $id = $_GET['id'] ?? null;

        if ($id) {
            $this->clientModel->deleteClient($id);
            header('Location: ?controller=client&action=listClientsController');
            exit;
        }
    }
}