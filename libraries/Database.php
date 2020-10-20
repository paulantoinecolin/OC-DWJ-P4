<?php

class Database {

    private static $instance = null;

    // Database connexion
    public static function dbConnect(): PDO
    {
        if(self::$instance === null) {
            self::$instance = new PDO('mysql:host=192.168.0.40; port=3306; dbname=jf_blog;charset=utf8', 'paul', 'grogro', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        }
    
        return self::$instance;
    }
}
