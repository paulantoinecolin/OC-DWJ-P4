<?php

namespace Controllers;

class User extends Controller
{
    protected $modelName = \Models\User::class;

    public function dashboard()
    {
        \Renderer::render('admin/dashboard');
    }

    public function login()
    {
        $User = new \models\User();
        $userData = $User->getAdminClearance($username, $userpassword);

        require('view/backend/login');
    }
}