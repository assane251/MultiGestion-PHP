<?php

class Client
{
    private int $id;
    private string $nom;
    private string $prenom;
    private string $email;
    private string $telephone;
    protected PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    public function setPrenom($prenom): void
    {
        $this->prenom = $prenom;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function setTelephone($telephone): void
    {
        $this->telephone = $telephone;
    }

    /**
     * cette methode permet de recuperer tous les equipement
     * @return array tous les equipement
     */
    public function listTousLesClients(): array
    {
        $query = "SELECT * FROM client";
        return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * cette methode permet d'ajouter un client
     * @return void
     */
    public function ajouterClient(): void
    {
        $query = "INSERT INTO client (nom, prenom, email, telephone) VALUES (:nom, :prenom, :email, :telephone)";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            ':nom' => $this->nom,
            ':prenom' => $this->prenom,
            ':email' => $this->email,
            ':telephone' => $this->telephone,
        ]);
    }

    /**
     * cette methode permet de modifier un client existant
     * @return void
     */
    public function modifierClient(): void
    {
        try {
            $query = "UPDATE client SET nom = :nom, prenom = :prenom, email = :email, telephone = :telephone WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->execute([
                ':nom' => $this->nom,
                ':prenom' => $this->prenom,
                ':email' => $this->email,
                ':telephone' => $this->telephone,
                ':id' => $this->id,
            ]);
        } catch (PDOException $e) {
            $message_erreur = "Une erreur de base de données est survenue : " . $e->getMessage();

            // Afficher un message à l'utilisateur
            $_SESSION['erreur'] = $message_erreur;
        }
    }

    /**
     * cette methode permet de recuperer le client par son id
     * @param integer $id l'id du client
     * @return \http\Client
     */
    public function recupererClientParId(int $id)
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
    public function supprimerClient(int $id): void
    {
        $query = "DELETE FROM client WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $id]);
    }
}
