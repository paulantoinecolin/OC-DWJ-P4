<?php
require_once('../libraries/controllers/auth.php');
forceAdminConnection();
?>

<?php $pageTitle = 'Jean Forteroche - Ecrivain'; ?>

<?php ob_start(); ?>


    <div class="container">
	<h1>Dashboard</h1>
 

<?php $pageContent = ob_get_clean(); ?>

<?php require('../layout.view.php'); ?>