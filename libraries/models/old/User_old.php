<?php

namespace models;

require_once("../libraries/models/Database.php");

class User extends Model
{
    public function getAdminClearance()
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT username, userpassword FROM user WHERE user = ??');
        $adminId = $req->execute(array($username, $userpassword));

        return $adminId;
    }
}
