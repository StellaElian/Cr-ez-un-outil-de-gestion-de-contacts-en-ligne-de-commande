<?php 
// Rôle est de comprendre ce que l'utilisateur tape et d'appeler la bonne action 

require_once "ContactManager.php";

// Pour taper dans le Terminal
class command
{
    private ContactManager $manager;

    public function __construct(ContactManager $manager)
    {
        // on le garde pour l'utiliser
        $this->manager = $manager;
    }

    // Commande list
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

    // Commande detail
    public function detail(string $line): void
    {
        // preg_match sert à vérifier si la commande est bien écrite 
        // $matches est un taleau qui sert à stocker les morceaux d'un texte qu'on a réussi à reconnaître
        if(preg_match('/^detail (\d+)$/', $line, $matches)) // Cette fonction verifie si la commande correspond au format, coupe la commande en morceaux, met les résultats dans $matches
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

    // Commande Create 
    public function create(string $line): void 
    {   // preg_match sert à vérifier si la commande est bien écrite 
        if (preg_match('/^create ([^,]+),([^,]+),([^,]+)$/', $line, $matches)) 
        {
            // trim() est une fonction php qui sert à nettoyer un texte (les espaces, les retours à la ligne) afin d'avoir une commande propre et lisible
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
    // Commande delete
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