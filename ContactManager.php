<?php

require_once "DBConnect.php";
require_once "contact.php";           

class ContactManager
{
    private PDO $pdo;

    public function __construct( PDO $pdo) 
    {
        //$db= new DBconnect();
        $this->pdo = $pdo;
    }
    
    public function findAll(): array 
    {
        $contacts = [];

        $sql= "SELECT * FROM contact";
        $statement = $this->pdo->query($sql);
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

        
        foreach($rows as $row)
        {
            $contact = new contact();

            $contact->setId($row['id']);
            $contact->setName($row['name']);
            $contact->setEmail($row['email']);
            $contact->setPhoneNumber($row['phone_number']);

            $contacts[] = $contact;

        }
        return $contacts;
    }

    public function findById($id)
    {
        $statement = $this->pdo->prepare("SELECT * FROM contact WHERE id = ?");
        $statement->execute([$id]);
        $row = $statement->fetch(PDO::FETCH_ASSOC);

        if($row === false)
        {
            return null; 
        }
        $contact = new contact();

        $contact->setId($row['id']);
        $contact->setName($row['name']);
        $contact->setEmail($row['email']);
        $contact->setPhoneNumber($row['phone_number']);

        return $contact;
    }

     public function create(string $name, string $email, string $phoneNumber): void 
        {
            $statement = $this->pdo->prepare("INSERT INTO contact (name, email, phone_number) VALUES (?, ?, ?)" );
            $statement->execute([$name, $email, $phoneNumber]);
        }

        public function delete(int $id): void
        {
            $statement = $this->pdo->prepare("DELETE FROM contact WHERE id = ? ");
            $statement->execute([$id]);
        }
}
