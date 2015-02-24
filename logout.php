<?php require_once 'core/init.php'; ?>
<?php require_once 'core/template/header.inc.php'; ?>
<?php restricted(); ?>

<?php 
	session_destroy($_SESSION['admin']);
	header('Location: index.php');
?>
		
<?php require_once 'core/template/footer.inc.php'; ?>