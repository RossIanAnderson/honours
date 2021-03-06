<?php require_once 'core/init.php'; ?>
<?php require_once 'core/template/header.inc.php'; ?>
<?php restrictedQuestionnaire(); ?>
	
<div class="col">
	<div class="questionnaire-image-container">
		<img src="img/facebook-profile.png" alt="Facebook Profile">
	</div>
</div>

<div class="col right">
	<header class="clear">
		<a href="flush.php" class="btn pull-right">Quit</a>
	</header>
	<section class="questionnaire">
		<div class="questionnaire-loading">
			<h1>Loading Content</h1>
			<div><i class="fa fa-spinner fa-pulse"></i></div>
			<h3>Please Wait</h3>
		</div>
	</section>
	<footer>
		<form id="questionnaire-form" action="completed.php" method="post">
			<?php
				for ($x=1; $x<=26; $x++) {
					echo '<input type="hidden" name="statement' . $x . '" value="">';
				} 
			?>
		</form>
		<button data-next="2" class="pull-right">Next</button>
	</footer>
</div>
		
<?php require_once 'core/template/footer.inc.php'; ?>