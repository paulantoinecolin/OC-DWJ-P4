<?php
require('controller/frontend.php');

$route = !isset($_GET['action']) ? 'listPosts' : $_GET['action'];

try {
    switch ($route) {
        case 'listPosts':
                listPosts();
            break;  
        case 'post':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                throw new Exception('Aucun identifiant de post envoyé');
            }
            break;
        case $_GET['action'] == 'addComment':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    throw new Exception('veuillez renseigner tous les champs');
                }
            }
            else {
                throw new Exception('Aucun identifiant de post envoyé');
            }
            break;
        case $_GET['action'] == 'flag':
                flagComment($_GET['commentid']);
        break;  
        // default:
            // Rediriger vers page d'erreur 404
    } 
}
catch(Exception $e) {
    $errorMessage = $e->getMessage();
    require('view/errorView.php');
}
