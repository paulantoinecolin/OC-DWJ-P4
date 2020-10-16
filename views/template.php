<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="../../public/css/style.css" rel="stylesheet" /> 
    </head>
        
    <body>

    <ul class="navbar-nav">
        <?php if (isConnected()):  ?>
            <li class="nav-item">
            <button style="">
            <a href="?action=logout" class="nav-link">Logout</a>
            </button>
            </li>
        <?php endif ?>    
    </ul>

    <div class="container-fluid">
        <?= $content ?>
    </div>


<footer class="page-footer font-small blue">
  <div class="footer-copyright text-center py-3">© 2020 Copyright : Jean Forteroche - 
    <a href="#/privacy-policy/">Politique de confidentialité</a>
  </div>
</footer>
    </body>
</html>