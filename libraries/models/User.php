<?php

namespace Models;

class User extends Model
{
    protected $table = "users";

    public function login()
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT username, userpassword FROM user WHERE user = ??');
        $adminId = $req->execute(array($username, $userpassword));

        return $adminId;
    }
}