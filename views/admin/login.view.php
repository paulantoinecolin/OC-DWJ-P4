<?php if (isset($_GET['msg'])): ?>
	    <div class="alert alert-success">Vous êtes bien déconnecté</div>
<?php endif ?>

<?php if ($error): ?>
	<div class="alert alert-danger"><?= $error ?></div>
<?php endif ?>

<div class="container">
    <div class="news">

<form action="" method="post">
	<div class="form-group">
		<input class="form-control" type="text" name="login" placeholder="login">
	</div>
	<div class="form-group">
		<input class="form-control"  type="password" name="password" placeholder="password">
	</div>
	<button type="submit" class="btn btn-primary">Login</button>
</form>