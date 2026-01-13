<?php

require_once "DBConnect.php";
require_once "ContactManager.php";
require_once "contact.php";
require_once "command.php";
// Le rôle du fichier est : de lancer le programme, lire les commandes et appeler la bonne méthode

// Connexion à la base de données 
$db= new DBConnect();
$pdo = $db->getPDO();

// Création du manager
$manager = new ContactManager($pdo);

// Création du gestionnaire de commandes
$command = new command($manager);

// Boucle infinie tant qu'on a pas tapé quit 
while (true) {
    // on demande une commande à l'utilisateur
    $line = readline("Entrez votre commande : ");

    if($line === "list")
        {
            $command->list();
        }
    
    // str_starts_with est une fonction php qui sert à vérifier si un texte commence par un mot précis, il regarde uniquement le début 
    // true si ça commence par ce mot précis 
    // false sinon
    // $command est un objet , $command->detail($line): signifie qu'on appelle la fonction detail de l'objet command en lui donnant la command tapée par l'utilisateur 
    elseif( str_starts_with($line, "detail"))
    {
        $command->detail($line);
    }
    
    elseif (str_starts_with($line, "create"))
    {
        $command->create($line);
    }
    
    elseif(str_starts_with($line, "delete"))
    {
        $command->delete($line);
    }
    
    elseif($line === "quit")
    {
        echo "Au revoir \n";
        break; 
    }
    else{
        echo "Commande inconnue\n";
    }
}
