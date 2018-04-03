
<?php echo validation_errors(); ?>

<?php if (isset($msg["error"]) && !empty($msg["error"])) : ?>
	<p class="alert alert-danger"><?= $msg["error"]; ?></p>
<?php endif; ?>