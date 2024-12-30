<?php

require_once __DIR__ . '/Client.php';

class RendezVous extends Client
{
    private int $id;
    private string $date;
    private string $heure;
    private string $description;
    private string $client_id;

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setDate($date): void
    {
        $this->date = $date;
    }

    public function setHeure($heure): void
    {
        $this->heure = $heure;
    }

    public function setDescription($description): void
    {
        $this->description = $description;
    }

    public function setClient_id($client_id): void
    {
        $this->client_id = $client_id;
    }

    public function listTousLesRendezvous()
    {
        $query = "SELECT * FROM rendezvous";
        return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function recupererendezvousParId($id)
    {
        $query = "SELECT * FROM rendezvous WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function ajouterRendezvous()
    {
        $query = "INSERT INTO rendezvous (date, heure, description, client_id) VALUES (:date, :heure, :description, :client_id)";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            'date' => $this->date,
            'heure' => $this->heure,
            'description' => $this->description,
            'client_id' => $this->client_id
        ]);
    }

    public function modifierRendezvous()
    {
        $query = "UPDATE rendezvous SET date = :date, heure = :heure, description = :description, client_id = :client_id WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            'id' => $this->id,
            'date' => $this->date,
            'heure' => $this->heure,
            'description' => $this->description,
            'client_id' => $this->client_id
        ]);
    }

    public function supprimerRendezvous($id)
    {
        $query = "DELETE FROM rendezvous WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $id]);
    }
}