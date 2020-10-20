<?php

// Dans cette classe on va pouvoir récuperer/utiliser des requêtes HTTP telles que
// Des redirections
// La session
// Des paramètres en GET ou en POST 

class Http {
    public static function redirect(string $url): void {
        header("Location: $url");
    exit();
    }
}