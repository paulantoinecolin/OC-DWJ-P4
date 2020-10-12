<?php
// require('libs/autoload.php');
require_once('../controller/frontend.php');
require_once('../controller/backend.php');
require_once('../controller/auth.php');
require_once('../libs/tools.php');

session_start();

// require_once($_SERVER['DOCUMENT_ROOT'] . '/controller/auth.php');

$route = !isset($_GET['action']) ? 'listPosts' : $_GET['action'];

try {
    switch ($route) {
        case $_SERVER['REQUEST_URI'] === '/admin':
            adminAccess();
        break;
        case 'listPosts':
                listPosts();
        break;
        case 'post':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            } else {
                throw new Exception('Aucun identifiant de post envoyé');
            }
        break;
        case $_GET['action'] == 'addComment':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                } else {
                    throw new Exception('veuillez renseigner tous les champs');
                }
            } else {
                throw new Exception('Aucun identifiant de post envoyé');
            }
            break;
        case $_GET['action'] == 'flag':
                flagComment($_GET['commentid']);
        break;
        case $_GET['action'] == 'logout':
                logout();
        break;

    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    require('view/errorView.php');
}
