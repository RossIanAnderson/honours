<?php require_once 'core/init.php'; ?>
<?php require_once 'core/template/header.inc.php'; ?>
		
<?php

	$statements = array();

	for ($x=1; $x<=26; $x++) {
		
		$statements[$x] = empty($_POST['statement' . $x]) ? 35 : (int)$_POST['statement' . $x];

	} 
	
	echo "<pre>";
	print_r($statements);
	echo "</pre>"
		
?>
		
<?php require_once 'core/template/footer.inc.php'; ?>