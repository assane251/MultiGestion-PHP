<?php

namespace AlHassane\MultiGestionPHP\Controllers;

use AlHassane\MultiGestionPHP\Models\Animal;

class AnimalController
{

    private $animalRepository;
    public function __construct()
    {
        global $entityManager;
        $this->animalRepository = $entityManager->getRepository(Animal::class);
    }

    public function index()
    {
        $animals = $this->animalRepository->findAll();
        return $animals;
    }

//    public function listRendezvousController()-
//    {
//        $rendezvous = $this->rendezvousModel->getAllRendezvous();
//        require_once __DIR__ . '/../views/animal/show.php';
//    }
//
//    public function addRendezvousController()
//    {
//        $clients = $this->clientModel->getAllClients();
//
//        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//            $this->rendezvousModel->setType($_POST['date']);
//            $this->rendezvousModel->setAge($_POST['hours']);
//            $this->rendezvousModel->setDescription($_POST['description']);
//            $this->rendezvousModel->setEquipement_id($_POST['client_id']);
//            $this->rendezvousModel->addRendezvous();
//
//            header('Location: index.php?controller=animal&action=listRendezvousController');
//            exit;
//        }
//        require_once __DIR__ . '/../views/animal/create.php';
//    }
//
//    public function editRendezvousController()
//    {
//        $clients = $this->clientModel->getAllClients();
//
//        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//            $this->rendezvousModel->setId($_POST['id']);
//            $this->rendezvousModel->setType($_POST['date']);
//            $this->rendezvousModel->setAge($_POST['hours']);
//            $this->rendezvousModel->setDescription($_POST['description']);
//            $this->rendezvousModel->setEquipement_id($_POST['client_id']);
//            $this->rendezvousModel->updateRendezvous();
//
//            header('Location: index.php?controller=animal&action=listRendezvousController');
//            exit;
//        } else {
//            $id = $_GET['id'] ?? null;
//            $rendezvous = $this->rendezvousModel->getRendezvousById($id);
//            require_once __DIR__ . '/../views/animal/edit.php';
//        }
//    }
//
//    public function deleteRendezvousController()
//    {
//        $id = $_GET['id'] ?? null;
//
//        if ($id) {
//            $this->rendezvousModel->deleteRendezvous($id);
//            header('Location: index.php?controller=animal&action=listRendezvousController');
//            exit;
//        }
//    }
}