<?php
// Le role de contact.php est de stocker et afficher les informations d'un contact ( une seule personne). Il ne pale pas à la base de données .

class Contact
{
   // private car on a pas le droit de modifier + 
    private ?int $id;
    private ?string $name;
    private ?string $email;
    private ?string $phoneNumber;

    // Methode pour lire les données et ça sert à recuperer l'identifiant, le nom, l'email, le numero du contact ( d'où get)
   public function getId(): ?int 
   {// retourne l'id, le nom, l'émail, le numéro du contact 
    return $this->id;
   }
   public function getName(): ?string 
   {
    return $this->name;
   }
    public function getEmail(): ?string 
   {
    return $this->email;
   }
    public function getPhoneNumber(): ?string 
   {
    return $this->phoneNumber;
   }

// Méthode pour modifier les données , sert à donner une valeur au contact (set)
   public function setId(?int $id) : void 
   {
      // Stocke l'id , le nom, l'émail, le numéro du contact 
    $this->id = $id;
   }
   public function setName(?string $name) : void
   {
    $this->name = $name;
   }
   public function setEmail(?string $email) : void
   {
    $this->email = $email;
   }
   public function setPhoneNumber(?string $phoneNumber) : void
   {
    $this->phoneNumber = $phoneNumber;
   }

   // Affichage du contact . Quand on fait $contact la methode est appelée automatiquement et elle transforme l'objet Contact en texte 
   public function __toString() : string
   {
     return 
        'ID : ' . $this->id . PHP_EOL .
        'Nom : ' . $this->name . PHP_EOL .
        'Email : ' . $this->email . PHP_EOL .
        'Téléphone : ' . $this->phoneNumber . PHP_EOL ;
   }
    


}