<?php

// Chargement des classes
require_once('../libraries/models/UserManager.php');
// require_once('model/PostManager.php');
// require_once('model/CommentManager.php');

function adminAccess()
{
    require('../views/backend/dashboard.php');
}

function checkAdminClearance()
{
    $userManager = new \OpenClassrooms\Blog\Model\UserManager();
    $userData = $userManager->getAdminClearance($username, $userpassword);

    require('view/backend/login.php');
}
