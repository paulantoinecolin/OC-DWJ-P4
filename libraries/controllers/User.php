<?php

namespace Controllers;

class User extends Controller
{
    protected $modelName = \Models\User::class;

    public function admin()
    {
        $error = null;

        \Renderer::render('admin/login', compact('error'));
    }

    public function login()
    {
        $error = null;

        // we check the form datas in POST and that they are not null
        // first user name
        $tryUsername = null;
        if (!empty($_POST['tryUsername'])) {
            $tryUsername = htmlspecialchars($_POST['tryUsername']);
        }

        // then user password
        $tryPassword = null;
        if (!empty($_POST['tryPassword'])) {
            $tryPassword = htmlspecialchars($_POST['tryPassword']);
        }

        $adminInfo = $this->model->login();

        $username = $adminInfo['username'];
        $userpassword = $adminInfo['userpassword'];

        if ($tryUsername === $username && password_verify($tryPassword, $userpassword)) {
            $_SESSION['isAdmin'] = true;
            \Http::redirect("index.php");
        } else {
            $error = $_SERVER['REQUEST_METHOD'] === 'POST'? 'Identifiants incorrects' : null;
            $_SESSION['isAdmin'] = false;
            \Renderer::render('admin/login', compact('error'));
        }
    }
    
    public function logout()
    {
        $_SESSION['isAdmin'] = false;
        \Http::redirect("index.php");
    }

    public static function isAdmin()
    {
        if (!$_SESSION['isAdmin']) {
            \Http::redirect("index.php");
            die();
        }
    }

    public function moderation()
    {
        User::isAdmin();

        $articleModel = new \Models\Article();
        $articles = $articleModel->findAll();

        $commentModel = new \Models\Comment();
        $commentaires = $commentModel->findAllReported();
        $articles_id = $commentaires['postid'];


        \Renderer::render('admin/moderation', compact('articles', 'commentaires', 'article_id'));
    }
}
