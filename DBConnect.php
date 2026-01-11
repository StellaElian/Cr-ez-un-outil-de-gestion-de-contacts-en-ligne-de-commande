<?php
class DBConnect{ 
    public function getPDO():PDO 
    {
        return new PDO ('mysql:dbname=carnet_adresses;host=127.0.0.1;charset=utf8','root','');
    }

}

