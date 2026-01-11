<?php 

require_once "ContactManager.php";

class command
{
    private ContactManager $manager;

    public function __construct(ContactManager $manager)
    {
        $this->manager = $manager;
    }

    public function list(): void
    {
        $contacts = $this->manager->findAll();

        if(empty($contacts))
        {
            echo "aucun contact trouvé\n";
            return;
        }
        foreach($contacts as $contact)
        {
            echo $contact . PHP_EOL;
            echo "----------" . PHP_EOL;
        }

    }

    public function detail(string $line): void
    {
        if(preg_match('/^detail (\d+)$/', $line, $matches))
        {
            $id = (int)$matches[1];
            $contact = $this->manager->findById($id);

            if($contact === null)
            {
                echo " Contact non trouvé \n";
                return;
            }
            echo $contact . PHP_EOL;
        }
        else 
        {
            echo " Commande invalide. Usage : detail [id]\n";
        }
    }

    public function create(string $line): void 
    {
        if (preg_match('/^create ([^,]+),([^,]+),([^,]+)$/', $line, $matches)) 
        {
            $name = trim($matches[1]);
            $email = trim($matches[2]);
            $phoneNumber = trim($matches[3]);
            $this->manager->create($name, $email, $phoneNumber);
            echo "Contact créé avec succès : $name \n";
        }else
        {
            echo "Commande invalide. Usage : create [name], [email], [phoneNumber] \n";
        }
    }

    public function delete(string $line): void
    {
        if(preg_match('/^delete (\d+)$/', $line, $matches))
        {
            $id = (int)$matches[1];
            $this->manager->delete($id);
            echo "Contact supprimé : $id \n";
        }
        else
        {
            echo "Commande invalide. Usage : delete [id] \n";
        }
    }
}