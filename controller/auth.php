<?php

function isConnected()
{
    // Si la session n'est pas active je lance un session_start
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    return !empty($_SESSION['connected']);
}

// Redirige l'utilisateur vers la page de login
function forceAdminConnection()
{
    if (!isConnected()) {
        header('Location: ../view/backend/login.php');
        exit();
    }
}
