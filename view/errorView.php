<?php $title = 'Oops perdu'; ?>

<?php ob_start(); ?>

<div class="d-flex justify-content-center align-items-center alert alert-warning">

<?php

echo ('Erreur : ') . $errorMessage;

?>

<button type="button" class="btn btn-warning btn-sm mx-3" onclick="goBack()">Retour</button>

<script>
function goBack() {
  window.history.back();
}
</script>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('frontend/template.php'); ?>