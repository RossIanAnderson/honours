<?php require_once 'core/init.php'; ?>
<?php require_once 'core/template/header.inc.php'; ?>
<?php
	if( !empty($_SESSION['userInfo']) || !empty($_SESSION['admin']) ){
		redirect('flush');
	}
	$browser = get_user_browser();
?>
<div class="display">
	<h1>404 Error</h1>
	<div class="display-content">
		<p>Whoopsie!</p>		

		<a href=".">Back to the main page</a>
	</div>
</div>

<?php require_once 'core/includes/modals/user-info.modal.php'; ?>
<?php require_once 'core/includes/modals/instructions.modal.php'; ?>
<?php require_once 'core/includes/modals/admin-login.modal.php'; ?>
	
<?php require_once 'core/template/footer.inc.php'; ?>