<?php

namespace OpenClassrooms\Blog\Model;

require_once("../libraries/models/Manager.php");

class UserManager extends Manager
{
    public function getAdminClearance()
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT username, userpassword FROM user WHERE user = ??');
        $adminId = $req->execute(array($username, $userpassword));

        return $adminId;
    }
}
