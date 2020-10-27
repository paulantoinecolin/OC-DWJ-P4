<!-- <?php if (isset($_GET['msg'])): ?>
	    <div class="alert alert-success">Vous êtes bien déconnecté</div>
<?php endif ?> -->

<div class="container">
	<div class="news">
		
		<?php if ($error): ?>
			<div class="alert alert-danger">
				<?= $error ?>
			</div>
		<?php endif ?>

<form action="index.php?controller=user&task=login" method="POST">
	<div class="form-group">
		<input class="form-control" type="text" name="tryUsername" placeholder="username">
	</div>
	<div class="form-group">
		<input class="form-control"  type="password" name="tryPassword" placeholder="password">
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
</form>