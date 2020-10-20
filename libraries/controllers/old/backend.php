<?php

// Chargement des classes
require_once('../libraries/models/User.php');
// require_once('model/Post.php');
// require_once('model/Comment.php');

function adminAccess()
{
    require('../views/backend/dashboard.php');
}

function checkAdminClearance()
{
    $User = new \models\User();
    $userData = $User->getAdminClearance($username, $userpassword);

    require('view/backend/login.php');
}
