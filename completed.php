<?php require_once 'core/init.php'; ?>
<?php require_once 'core/template/header.inc.php'; ?>
<?php restrictedQuestionnaire(); ?>

<?php
	if( !isset($_SESSION['submitted']) ){
			
		$statements = array();
		for ($x=1; $x<=26; $x++) {
			$statements[$x] = empty($_POST['statement' . $x]) ? 35 : (int)$_POST['statement' . $x];
			$statements[$x] = $statements[$x] < 0 ? 0 : $statements[$x];
			$statements[$x] = $statements[$x] > 70 ? 70 : $statements[$x];
		}
		
		$sql = "INSERT INTO responses(`id`, `age`, `sex`, `usage`, `response1`, `response2`, `response3`, `response4`, `response5`, `response6`, `response7`, `response8`, `response9`, `response10`, `response11`, `response12`, `response13`, `response14`, `response15`, `response16`, `response17`, `response18`, `response19`, `response20`, `response21`, `response22`, `response23`, `response24`, `response25`, `response26` )
				VALUES('', :age, :sex, :usage, :response1, :response2, :response3, :response4, :response5, :response6, :response7, :response8, :response9, :response10, :response11, :response12, :response13, :response14, :response15, :response16, :response17, :response18, :response19, :response20, :response21, :response22, :response23, :response24, :response25, :response26 )";
		
		$query = $db->prepare( $sql );
		
		$query->execute( 
			array(
				':age'	=>$_SESSION['userInfo']['age'],
				':sex'	=>$_SESSION['userInfo']['sex'],
				':usage'=>$_SESSION['userInfo']['usage'],
				':response1'=>$statements[1],
				':response2'=>$statements[2],
				':response3'=>$statements[3],
				':response4'=>$statements[4],
				':response5'=>$statements[5],
				':response6'=>$statements[6],
				':response7'=>$statements[7],
				':response8'=>$statements[8],
				':response9'=>$statements[9],
				':response10'=>$statements[10],
				':response11'=>$statements[11],
				':response12'=>$statements[12],
				':response13'=>$statements[13],
				':response14'=>$statements[14],
				':response15'=>$statements[15],
				':response16'=>$statements[16],
				':response17'=>$statements[17],
				':response18'=>$statements[18],
				':response19'=>$statements[19],
				':response20'=>$statements[20],
				':response21'=>$statements[21],
				':response22'=>$statements[22],
				':response23'=>$statements[23],
				':response24'=>$statements[24],
				':response25'=>$statements[25],
				':response26'=>$statements[26]
			)
		);
		
		$_SESSION['submitted'] = true;
	}
?>

<div class="display">
	<h1>Thank You!</h1>
	<div class="display-content">
		<p>Thank you so much for making it all the way to the end.</p>
		<a href="flush.php" class="btn">Bye!</a>
	</div>
</div>
		
<?php require_once 'core/template/footer.inc.php'; ?>