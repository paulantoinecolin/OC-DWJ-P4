<?php
// require('libraries/autoload.php');
require_once('../libraries/autoload.php');
require_once('../libraries/tools.php');
require_once('../libraries/controllers/PostController.php');
require_once('../libraries/controllers/CommentController.php');
require_once('../libraries/controllers/backend.php');
require_once('../libraries/controllers/auth.php');

session_start();

// require_once($_SERVER['DOCUMENT_ROOT'] . '/controller/auth.php');

$route = !isset($_GET['action']) ? 'listPosts' : $_GET['action'];

try {
    switch ($route) {
        case $_SERVER['REQUEST_URI'] === '/admin':
            adminAccess();
        break;
        case 'listPosts':
                $postController = new \controllers\PostController();
                $postController->listPosts();
        break;
        case 'post':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $postController = new \controllers\PostController();
                $postController->post();
            } else {
                throw new Exception('Aucun identifiant de post envoyé');
            }
        break;
        case $_GET['action'] == 'addComment':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    $postController = new \controllers\CommentController();
                    $postController-> addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                } else {
                    throw new Exception('veuillez renseigner tous les champs');
                }
            } else {
                throw new Exception('Aucun identifiant de post envoyé');
            }
            break;
        case $_GET['action'] == 'flag':
            $postController = new \controllers\CommentController();
            $postController->flagComment($_GET['commentid']);
        break;
        case $_GET['action'] == 'logout':
                logout();
        break;

    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    require('../views/errorView.php');
}
