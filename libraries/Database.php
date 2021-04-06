<?php

class Database
{
    private static $instance = null;

    // Database connexion
    public static function dbConnect(): PDO
    {
        if (self::$instance === null) {
            self::$instance = new PDO('mysql:host=localhost; port=3306; dbname=oc_dwj_p4;charset=utf8', 'root', '', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Return informations if error
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // By default we want arrays
            ]);
        }

        return self::$instance;
    }
}
