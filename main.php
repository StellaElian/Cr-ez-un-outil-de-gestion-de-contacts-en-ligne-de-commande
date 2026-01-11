<?php

require_once "DBConnect.php";
require_once "ContactManager.php";
require_once "contact.php";
require_once "command.php";


$db= new DBConnect();
$pdo = $db->getPDO();

$manager = new ContactManager($pdo);

$command = new command($manager);


while (true) {
    $line = readline("Entrez votre commande : ");

    if($line === "list")
        {
            $command->list();
        }
    
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
