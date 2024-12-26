<?php

require_once __DIR__ . '/../database.php';
require_once __DIR__ . '/../models/RendezVous.php';
require_once __DIR__ . '/../models/Client.php';

class RendezVousController
{
    private $rendezvousModel;
    private $clientModel;

    public function __construct()
    {
        $this->rendezvousModel = new Animaux(Database::getInstance());
        $this->clientModel = new Equipement(Database::getInstance());
    }

    public function listRendezvousController()
    {
        $rendezvous = $this->rendezvousModel->getAllRendezvous();
        require_once __DIR__ . '/../views/rendezvous/show.php';
    }

    public function addRendezvousController()
    {
        $clients = $this->clientModel->getAllClients();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->rendezvousModel->setType($_POST['date']);
            $this->rendezvousModel->setAge($_POST['hours']);
            $this->rendezvousModel->setDescription($_POST['description']);
            $this->rendezvousModel->setEquipement_id($_POST['client_id']);
            $this->rendezvousModel->addRendezvous();

            header('Location: index.php?controller=animal&action=listRendezvousController');
            exit;
        }
        require_once __DIR__ . '/../views/rendezvous/create.php';
    }

    public function editRendezvousController()
    {
        $clients = $this->clientModel->getAllClients();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->rendezvousModel->setId($_POST['id']);
            $this->rendezvousModel->setType($_POST['date']);
            $this->rendezvousModel->setAge($_POST['hours']);
            $this->rendezvousModel->setDescription($_POST['description']);
            $this->rendezvousModel->setEquipement_id($_POST['client_id']);
            $this->rendezvousModel->updateRendezvous();

            header('Location: index.php?controller=animal&action=listRendezvousController');
            exit;
        } else {
            $id = $_GET['id'] ?? null;
            $rendezvous = $this->rendezvousModel->getRendezvousById($id);
            require_once __DIR__ . '/../views/rendezvous/edit.php';
        }
    }

    public function deleteRendezvousController()
    {
        $id = $_GET['id'] ?? null;

        if ($id) {
            $this->rendezvousModel->deleteRendezvous($id);
            header('Location: index.php?controller=animal&action=listRendezvousController');
            exit;
        }
    }
}