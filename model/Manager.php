<?php

namespace OpenClassrooms\Blog\Model;

class Manager
{
    //Connexion constants
    const DB_HOST='mysql:host=localhost:3306;dbname=jf_blog;charset=utf8';
    const DB_USER='paul';
    const DB_PASS='+Gro@Mysql?';

    //Connexion method
    protected function dbConnect()
    {
        $db = new \PDO(self::DB_HOST, self::DB_USER, self::DB_PASS, array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
        return $db;
    }
}
