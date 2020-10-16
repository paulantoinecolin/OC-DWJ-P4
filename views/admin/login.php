<?php $title = 'Page de connexion';?>

<?php ob_start(); ?>

<?php
$error = null;
// $password = '$2y$12$4kx3VFNpNhxgXDUXVmwiSOLJ0OgAhEKjfVc3b3gtvueBgpPucnKgO';
// password_verify($_POST['password'], $password)
$password = 'doe';
if (!empty($_POST['login']) && !empty($_POST['password'])) {
    if ($_POST['login'] === 'Jean_Forteroche' && $_POST['password'] === 'doe') {
        // session_start();
        $_SESSION['connected'] = 1;
        header('Location: dashboard.php');
        exit();
    } else {
        $error = 'Identifiants incorrects';
    }
}

require_once('../../libraries/controllers/auth.php');
if (isConnected()) {
    header('Location: dashboard.php');
    exit();
}
?>

<?php if (isset($_GET['msg'])): ?>
	    <div class="alert alert-success">Vous êtes bien déconnecté</div>
<?php endif ?>

<?php if ($error): ?>
	<div class="alert alert-danger"><?= $error ?></div>
<?php endif ?>

<form action="" method="post">
	<div class="form-group">
		<input class="form-control" type="text" name="login" placeholder="login">
	</div>
	<div class="form-group">
		<input class="form-control"  type="password" name="password" placeholder="password">
	</div>
	<button type="submit" class="btn btn-primary">Login</button>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('../layout.php'); ?>