<pre><?php var_dump($_SERVER); ?></pre>
<pre><?php var_dump($_SERVER['REQUEST_URI']); ?></pre>
<pre><?php var_dump($_SERVER['REQUEST_METHOD']); ?></pre>
<pre><?php var_dump($_SERVER['QUERY_STRING']); ?></pre>
<!-- <pre><?php print_r($GLOBALS); ?></pre> -->
<pre><?php var_dump($_SESSION); ?></pre>

<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="css/style.css" rel="stylesheet" /> 
        <title>Jean Forteroche - Ecrivain - <?= $pageTitle ?></title>
        <script src="https://cdn.tiny.cloud/1/9fmszb44igwq5ax4mdmk1p0o75hgom6frjdv4um7iddv4uib/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

      <script>
        tinymce.init({
        selector: '#tiny'
        });
      </script>

</head>

<body>
    <?= $pageContent ?>

    <footer class="page-footer font-small blue">
    <div class="footer-copyright text-center py-3">© 2020 Copyright : Jean Forteroche - 
    <a href="#/privacy-policy/">Politique de confidentialité</a>
    </div>
    </footer>
</body>

</html>