<?php
// fichier sert à se connecter à la base de données 
// La classe sert uniquement ànse connecter à la base de données 
class DBConnect
{ 
    public function getPDO():PDO 
    // PDO : outil php qui permet de parler avec la base de données, on y précise le nom de la base, l'adresse du serveur host, le type de charactère, l'identifiant qui est root par defaut et le motde passe qui est vide par défaut 
    {
        $config = require 'config.php';
        return new PDO
        (
            'mysql:dbname=' . $config['db_name'] . ';host=' . $config['db_host'] . ';charset=utf8',
            $config['db_user'],
            $config['db_pass']
        );
    }

}

