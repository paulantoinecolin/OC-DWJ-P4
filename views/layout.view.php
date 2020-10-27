<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <link href="/css/style.css" rel="stylesheet" /> 
        <title>Jean Forteroche - Ecrivain - <?= $pageTitle ?></title>


</head>



<body>

<a href="/">
<div class="jumbotron">
  <div class="container">
    <h1 class="display-4 font-weight-bold"">Jean Forteroche, écrivain sans histoires</h1>
    <p class="lead font-weight-bold font-italic">Chaque jour retrouvez un nouveau chapitre de mon livre</p>
  </div>
  </div>
  </a>

  <?php if ($_SESSION['isAdmin'] ): ?>
  <button class="btn btn-primary" onclick="window.location='/index.php?controller=user&task=logout'">logout</button>
  <?php endif;?>

    <?= $pageContent ?>

    <footer class="page-footer font-small blue">
    <div class="footer-copyright text-center py-3">© 2020 Copyright : Jean Forteroche - 
    <a href="#/privacy-policy/">Politique de confidentialité</a>
    </div>
    </footer>
    
</body>

</html>