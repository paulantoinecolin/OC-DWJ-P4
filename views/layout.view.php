<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link href="/css/style.css" rel="stylesheet" />
  <title>Jean Forteroche - Ecrivain<?php if (isset($pageTitle)) {
    echo " - " . $pageTitle;
} ?></title>
</head>

<body>

  <a href="/">
    <header class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4 font-weight-bold">Jean Forteroche, écrivain sans histoires</h1>
        <p class=" lead font-weight-bold font-italic">Chaque jour retrouvez un nouveau chapitre de mon livre</p>
      </div>
    </header>
  </a>

  <?= $pageContent ?>

  <footer class="page-footer font-small blue">
    <div class="footer-copyright text-center py-3">© 2020 Copyright : Jean Forteroche -
      <a href="#/privacy-policy/">Politique de confidentialité</a>
    </div>
  </footer>

</body>

</html>