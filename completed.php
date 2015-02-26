<?php require_once 'core/init.php'; ?>
<?php require_once 'core/template/header.inc.php'; ?>
<?php restrictedQuestionnaire(); ?>

<?php

	$ageArr = array('err', '12-17', '18-24', '25-34', '35-44', '45-54', '55-64', '65-74');
	$smArr = array('err', 'Multiple minutes in an hour', 'A few minutes an hour', 'Once an hour', 'Every few hours in a day', 'Less than every few hours in a day', 'Never');

	$statements = array();
	for ($x=1; $x<=26; $x++) {
		$statements[$x] = empty($_POST['statement' . $x]) ? 35 : (int)$_POST['statement' . $x];
	}
	
	echo "<h2>User Info</h2>";
	echo "<pre>";
	print_r( $_SESSION['userInfo'] );
	echo "</pre>";
	
	echo $ageArr[ $_SESSION['userInfo']['age'] ] . "<br>";
	echo $sexArr[ $_SESSION['userInfo']['sex'] ] . "<br>";
	echo $smArr[ $_SESSION['userInfo']['sm'] ] . "<br>";

	echo "<h2>User Selections</h2>";
	echo "<pre>";
	print_r($statements);
	echo "</pre>"
	
?>

<a class="btn" href="flush.php">Flush Sessions</a>
		
<?php require_once 'core/template/footer.inc.php'; ?>