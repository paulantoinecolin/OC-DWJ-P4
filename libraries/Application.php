<?php

class Application
{
    public static function process()
    {
        //Default view for index
        $controllerName = "Article";
        $task = "index";

        if ($_SERVER['REQUEST_URI'] === '/admin') {
            \Http::redirect("index.php?controller=user&task=login");
        }

        if (!empty($_GET['controller'])) {
            // GET => article
            // = Article
            $controllerName = ucfirst($_GET['controller']);
        }

        if (!empty($_GET['task'])) {
            $task = $_GET['task'];
        }

        $controllerName = "\Controllers\\" . $controllerName;

        $controller = new $controllerName();
        $controller->$task();
    }
}
