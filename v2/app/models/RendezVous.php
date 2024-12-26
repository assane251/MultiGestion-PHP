<?php

class RendezVous extends Equipement
{
    private $id;
    private $date;
    private $hours;
    private $description;
    private $client_id;
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function setHours($hours)
    {
        $this->hours = $hours;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setClient_id($client_id)
    {
        $this->client_id = $client_id;
    }

    public function getAllRendezvous()
    {
        $query = "SELECT * FROM animal";
        return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRendezvousById($id)
    {
        $query = "SELECT * FROM animal WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addRendezvous()
    {
        $query = "INSERT INTO animal (date, hours, description, client_id) VALUES (:date, :hours, :description, :client_id)";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            'date' => $this->date,
            'hours' => $this->hours,
            'description' => $this->description,
            'client_id' => $this->client_id
        ]);
    }

    public function updateRendezvous()
    {
        $query = "UPDATE animal SET date = :date, hours = :hours, description = :description, client_id = :client_id WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            'id' => $this->id,
            'date' => $this->date,
            'hours' => $this->hours,
            'description' => $this->description,
            'client_id' => $this->client_id
        ]);
    }

    public function deleteRendezvous($id)
    {
        $query = "DELETE FROM animal WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $id]);
    }
}