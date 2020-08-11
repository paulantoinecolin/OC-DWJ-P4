<?php

// Chargement des classes
require_once('model/AdminManager.php');
// require_once('model/PostManager.php');
// require_once('model/CommentManager.php');

function adminAccess()
{
    require('view/backend/dashboard.php');
}

function checkAdminClearance()
{
    $adminManager = new \OpenClassrooms\Blog\Model\AdminManager();
    $adminData = $adminManager->getAdminClearance($username, $userpassword);

    require('view/backend/login.php');
}
