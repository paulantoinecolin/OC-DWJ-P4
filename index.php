<?php
require('controller/frontend.php');

try {
    switch ('action') {
        case $_GET['action'] == 'listPosts':
            if (isset($_GET['action'])) {
                listPosts();
            }
            break;  
        case $_GET['action'] == 'post':
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
                    throw new Exception(' : veuillez renseigner les champs obligatoires (pseudo, commentaires).');
                }
            }
            else {
                throw new Exception('Aucun identifiant de post envoyé');
            }
            break;
        default:
            listPosts();
    } 
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
