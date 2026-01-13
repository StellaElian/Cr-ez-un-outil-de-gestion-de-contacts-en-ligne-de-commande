<?php

// Le rôle du fichier est d'aller chercher les contacts dans la base de données, d'en ajouter si besoin, ou bien supprimer et transformer les données sql en objets Contact : une personne du carnet d'adresse 

require_once "DBConnect.php";
require_once "contact.php";           
// rôle est de se connecter à la base de données
class ContactManager
{
    private PDO $pdo;

    public function __construct( PDO $pdo) 
    {
        //$db= new DBconnect();
        $this->pdo = $pdo;
    }
    
    // Rôle est de récupérer tous les contacts sous forme de tableau
    public function findAll(): array 
    {
        $contacts = [];

        $sql= "SELECT * FROM contact";
        $statement = $this->pdo->query($sql);
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

        // boucle foreach permet de parcourir chaque ligne récupérée depuis la base de données et de créer un objet Contact à partir de chaque ligne
        foreach($rows as $row)
        {
            $contact = new contact();

            $contact->setId($row['id']);
            $contact->setName($row['name']);
            $contact->setEmail($row['email']);
            $contact->setPhoneNumber($row['phone_number']);

            // on ajoute l'objet au tableau
            $contacts[] = $contact;

        }
        return $contacts;
    }
    // récupérer un contact par Id
    public function findById($id)
    {
        // Preparation requête pour éviter les injections sql
        $statement = $this->pdo->prepare("SELECT * FROM contact WHERE id = ?");
        $statement->execute([$id]);
         // on récupère une ligne
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        // si aucun contact n'est trouvé
        if($row === false)
        {
            return null; 
        }
        $contact = new contact();

        // Sinon on crée l'objet contact
        $contact->setId($row['id']);
        $contact->setName($row['name']);
        $contact->setEmail($row['email']);
        $contact->setPhoneNumber($row['phone_number']);

        return $contact;
    }
    // Pour ajouter un contact
     public function create(string $name, string $email, string $phoneNumber): void 
        {
            $statement = $this->pdo->prepare("INSERT INTO contact (name, email, phone_number) VALUES (?, ?, ?)" );
            // Envoie de la valeur à la base de données
            $statement->execute([$name, $email, $phoneNumber]);
        }

        // Pour supprimer un contact
        public function delete(int $id): void
        {
            $statement = $this->pdo->prepare("DELETE FROM contact WHERE id = ? ");
            $statement->execute([$id]);
        }
}
