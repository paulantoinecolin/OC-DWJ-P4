<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/controller/auth.php');
forceAdminConnection();
?>

<?php $title = 'Jean Forteroche - Ecrivain'; ?>

<?php ob_start(); ?>


    <div class="container">
	<h1>Dashboard</h1>
 

<?php $content = ob_get_clean(); ?>

<?php require('../template.php'); ?>