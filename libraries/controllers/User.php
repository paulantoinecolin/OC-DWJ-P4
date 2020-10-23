<?php

namespace Controllers;

class User extends Controller
{
    protected $modelName = \Models\User::class;

    public function index()
    {    
        if ($_SESSION['role'] = "admin") {
            
            \Renderer::render('admin/login');
        } else {
            // find all articles in db and order by desc date
            $articleModel = new \Models\Article();
            $articles = $articleModel->findAll("postcreatedate DESC");
       
            // view title
            $pageTitle = "Dashboard";
    
            \Renderer::render('admin/dashboard', compact('pageTitle', 'articles'));
        }
    }

    public function login()
    {
        $error = null;
        // $password = '$2y$12$4kx3VFNpNhxgXDUXVmwiSOLJ0OgAhEKjfVc3b3gtvueBgpPucnKgO';
        // password_verify($_POST['password'], $password)
        $password = 'doe';

        if (!empty($_POST['login']) && !empty($_POST['password'])) {
        if ($_POST['login'] === 'Jean_Forteroche' && $_POST['password'] === 'doe') {
            // session_start();
            $_SESSION['role'] = "user";
            exit();
        } else {
            $error = 'Identifiants incorrects';
        }
    }
}
}