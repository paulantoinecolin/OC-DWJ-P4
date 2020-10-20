<?php

class Application {
    public static function process()
    {
        //Default view for index
        $controllerName = "Article";
        $task = "index";

        if(!empty($_GET['controller'])) {
            // GET => article
            // = Article
            $controllerName = ucfirst($_GET['controller']);
        }

        if(!empty($_GET['task'])) {
            $task = $_GET['task'];
        }

        $controllerName = "\Controllers\\" . $controllerName;

        $controller = new $controllerName();
        $controller->$task();
    }
}