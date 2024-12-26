<?php
class Client
{
    private $id;
    private $name;
    private $email;
    private $phone;
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * cette methode permet de recuperer tous les equipement
     * @return array tous les equipement
     */
    public function getAllClients()
    {
        $query = "SELECT * FROM client";
        return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * cette methode permet d'ajouter un client
     * @return void]
     */
    public function addClient()
    {
        $query = "INSERT INTO client (name, email, phone) VALUES (:name, :email, :phone)";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            ':name' => $this->name,
            ':email' => $this->email,
            ':phone' => $this->phone,
        ]);
    }

    /**
     * cette methode permet de modifier un client existant
     * @return void
     */
    public function updateClient()
    {
        $query = "UPDATE client SET name = :name, email = :email, phone = :phone WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            ':name' => $this->name,
            ':email' => $this->email,
            ':phone' => $this->phone,
            ':id' => $this->id,
        ]);
    }

    /**
     * cette methode permet de recuperer le client par son id
     * @param integer $id l'id du client
     * @return \http\Client
     */
    public function getClientById($id)
    {
        $query = "SELECT * FROM client WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * cette methode permet de supprimer le client par son id
     * @param integer $id l'id du client
     * @return void
     */
    public function deleteClient($id)
    {
        $query = "DELETE FROM client WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $id]);
    }
}
