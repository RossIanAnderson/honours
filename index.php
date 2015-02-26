<?php require_once 'core/init.php'; ?>
<?php require_once 'core/template/header.inc.php'; ?>
<?php
	if( !empty($_SESSION['userInfo']) || !empty($_SESSION['admin']) ){
		redirect('flush.php');
	}
?>
<div class="display">
	<h1>Hello</h1>
	<div class="display-content">
		<p>Thank you for taking the time to carry out this questionnaire.</p>
		<p>The questionnaire consists of pairs of contrasting attributes that apply to the application. The slider between the attributes represent gradations between the opposites. You can express your agreement with the attributes by dragging the thumb of the slider toward the attribute that most closely reflects your impression.</p>
		<p>I am well aware of how dull questionnaires can be but please persevere until the end.</p>

		<button data-toggle=".user-info">Lets Begin</button>
		<button data-toggle=".instructions">More Instructions</button>
		<button data-toggle=".admin-login">Admin</button>
	</div>
</div>

<?php require_once 'core/includes/modals/user-info.modal.php'; ?>
<?php require_once 'core/includes/modals/instructions.modal.php'; ?>
<?php require_once 'core/includes/modals/admin-login.modal.php'; ?>
	
<?php require_once 'core/template/footer.inc.php'; ?>