<?php

namespace Models;

class User extends Model
{
    protected $table = "users";

    public function login()
    {
        $query = $this->db->prepare("SELECT username, userpassword FROM users");
        $query->execute();
        $item = $query->fetch();
        return $item;
    }
}