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

    public function showRendezvousController()
    {
        $id = $_GET['id'] ?? null;

        if ($id) {
            // Récupérer les détails du rendez-vous
            $rendezvous = $this->rendezvousModel->recupererendezvousParId($id);

            // Vérifier si le rendez-vous existe
            if ($rendezvous) {
                // Récupérer les informations du client associé
                $client = $this->clientModel->recupererClientParId($rendezvous['client_id']);
                // Ajouter les informations du client au tableau de rendez-vous
                $rendezvous['client_nom'] = $client['nom'];
                $rendezvous['client_prenom'] = $client['prenom'];
            }

            // Charger la vue pour afficher les détails du rendez-vous
            require_once __DIR__ . '/../views/rendezvous/show.php';
        } else {
            // Si l'ID n'est pas valide, rediriger vers la liste des rendez-vous
            header('Location: ?controller=rendezvous&action=listRendezvousController');
            exit;
        }
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