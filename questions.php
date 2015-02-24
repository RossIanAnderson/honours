<?php require_once 'core/init.php'; ?>
<?php require_once 'core/template/header.inc.php'; ?>
		
			<div class="col pull-left"></div>


			<div class="col right">
				<header class="clear">
					<a href="exit.php" class="btn pull-right">Exit</a>
				</header>
				<section class="questionnaire">
					<div class="questionnaire-loading">
						<h1>Loading Content</h1>
						<div><i class="fa fa-spinner fa-pulse"></i></div>
						<h3>Please Wait</h3>
					</div>
				</section>
				<footer>
					<form id="questionnaire-form" action="" method="post">
						<input type="hidden" name="statementOne" value="">
						<input type="hidden" name="statementTwo" value="">
						<input type="hidden" name="statementThree" value="">
						<input type="hidden" name="statementFour" value="">
						<input type="hidden" name="statementFive" value="">
						<input type="hidden" name="statementSix" value="">
					</form>
					<button data-next="2" class="pull-right">Next</button>
				</footer>
			</div>
		
<?php require_once 'core/template/footer.inc.php'; ?>