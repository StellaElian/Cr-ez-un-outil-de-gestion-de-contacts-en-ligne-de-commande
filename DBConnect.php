<?php
// fichier sert à se connecter à la base de données 
// La classe sert uniquement ànse connecter à la base de données 
class DBConnect{ 
    public function getPDO():PDO 
    // PDO : outil php qui permet de parler avec la base de données, on y précise le nom de la base, l'adresse du serveur host, le type de charactère, l'identifiant qui est root par defaut et le motde passe qui est vide par défaut 
    {
        return new PDO ('mysql:dbname=carnet_adresses;host=127.0.0.1;charset=utf8','root','');
    }

}

