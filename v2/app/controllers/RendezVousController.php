<?php

require_once __DIR__ . '/../database.php';
require_once __DIR__ . '/../models/RendezVous.php';
require_once __DIR__ . '/../models/Client.php';

class RendezVousController
{
    private RendezVous $rendezvousModel;
    private Client $clientModel;

    public function __construct()
    {
        $this->rendezvousModel = new RendezVous(Database::getInstance());
        $this->clientModel = new Client(Database::getInstance());
    }

    public function listRendezvousController()
    {
        $rendezvous = $this->rendezvousModel->listTousLesRendezvous();
        require_once __DIR__ . '/../views/rendezvous/index.php';
    }

    public function ajouterRendezvousController()
    {
        $clients = $this->clientModel->listTousLesClients();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->rendezvousModel->setDate($_POST['date']);
            $this->rendezvousModel->setHeure($_POST['heure']);
            $this->rendezvousModel->setDescription($_POST['description']);
            $this->rendezvousModel->setClient_id($_POST['client_id']);
            $this->rendezvousModel->ajouterRendezvous();

            header('Location: index.php?controller=rendezvous&action=listRendezvousController');
            exit;
        }
        require_once __DIR__ . '/../views/rendezvous/create.php';
    }

    public function modifierRendezvousController()
    {
        $clients = $this->clientModel->listTousLesClients();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->rendezvousModel->setId($_POST['id']);
            $this->rendezvousModel->setDate($_POST['date']);
            $this->rendezvousModel->setHeure($_POST['heure']);
            $this->rendezvousModel->setDescription($_POST['description']);
            $this->rendezvousModel->setClient_id($_POST['client_id']);
            $this->rendezvousModel->modifierRendezvous();

            header('Location: index.php?controller=rendezvous&action=listRendezvousController');
            exit;
        } else {
            $id = $_GET['id'] ?? null;
            $rendezvous = $this->rendezvousModel->recupererendezvousParId($id);
            require_once __DIR__ . '/../views/rendezvous/edit.php';
        }
    }

    public function supprimerRendezvousController()
    {
        $id = $_GET['id'] ?? null;

        if ($id) {
            $this->rendezvousModel->supprimerRendezvous($id);
            header('Location: index.php?controller=rendezvous&action=listRendezvousController');
            exit;
        }
    }
}