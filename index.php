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
		<?php
			if( checkIE() === true ){
		?>
		<p>For you to be able to use this application you are going to have to use a better browser.</p>
		<p>Internet Explorer is not as advanced as other web browser.</p>
		<p>I recommend using Google Chrome:</p>
		<a href="https://www.google.com/chrome/browser/desktop/" target="_blank">Download Link</a>
		<?php		
			} else {	
		?>
		<p>Thank you for taking the time to carry out this questionnaire.</p>
		<p>The questionnaire consists of pairs of contrasting attributes that apply to the application. The slider between the attributes represent gradations between the opposites. You can express your agreement with the attributes by dragging the thumb of the slider toward the attribute that most closely reflects your impression.</p>
		<p>I am well aware of how dull questionnaires can be but please persevere until the end.</p>

		<button data-toggle=".user-info">Lets Begin</button>
		<button data-toggle=".instructions">More Instructions</button>
		<button data-toggle=".disclaimer">Disclaimer</button>
		<?php
			}	
		?>
	</div>
</div>
<img class="preload" src="img/facebook-profile.png">
<button data-toggle=".admin-login"><i class="fa fa-cog"></i></button>
<?php require_once 'core/includes/modals/user-info.modal.php'; ?>
<?php require_once 'core/includes/modals/instructions.modal.php'; ?>
<?php require_once 'core/includes/modals/disclaimer.modal.php'; ?>
<?php require_once 'core/includes/modals/admin-login.modal.php'; ?>
	
<?php require_once 'core/template/footer.inc.php'; ?>