<?php
namespace BlogFram;

class PDOFactory
{
    public static function getMysqlConnexion()
    {
        $db = new \PDO('mysql:host=localhost;dbname=chataignandblog', 'root', '');
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $db;
    }
}