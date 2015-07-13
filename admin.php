<?php require_once 'core/init.php'; ?>
<?php require_once 'core/template/header.inc.php'; ?>
<?php restrictedAdmin(); ?>

<?php
	$sql = "SELECT * FROM responses";
	
	$query = $db->prepare( $sql );
	$query->execute();
	$results = $query->fetchAll( PDO::FETCH_ASSOC );	
		
?>

<header class="clear">
	<p class="total">Total number of participants: <?php echo countParticipants($db) ?></p>
	<a class="btn pull-right" href="flush.php">Logout</a>
</header>

<main class="clear">
	
	<?php
	if(isset($_GET['response'])){
		$currentResponse = $_GET['response'];
	?>
	<a href="admin.php" class="home-link"><i class="fa fa-home"></i></a>
	<div class="response-chart-container">
		<input type="hidden" id="chart-data" value='<?php echo json_encode(getResponse($db, $currentResponse)) ?>'>
		<div id="response-chart"></div>
	</div> 
	<div class="response-navigation clear">
		<?php
			if($currentResponse >= 2){
		?>
		<a class="prev" href="admin.php?response=<?php echo $currentResponse - 1 ?>"><i class="fa fa-arrow-left"></i> Response <?php echo $currentResponse - 1 ?></a>
		<?php
			}	
		?>
		<?php
			if($currentResponse <= 25){
		?>
		<a class="next" href="admin.php?response=<?php echo $currentResponse + 1 ?>">Response <?php echo $currentResponse + 1 ?> <i class="fa fa-arrow-right"></i> </a>
		<?php
			}	
		?>
	</div>
	
	<?php
	} else {	
	?>
	<div class="table-container">
		<table>
			<thead>
				<tr>
					<th>Responses</th>
					<th><i class="fa fa-arrow-down"></i></th>
					<th>-</th>
					<th><i class="fa fa-arrow-up"></i></th>
				</tr> 
			</thead>
			<tbody>
				<?php
					for( $i=1; $i<=26; $i++ ){
						echo '<tr><td>';
						echo '<a href="?response=' . $i . '">Response No. ' . $i;
						echo '</td><td>';
						echo getResponses($db, 'MIN', $i);
						echo'</td><td>';
						echo getResponses($db, 'AVG', $i);					
						echo '</td><td>';
						echo getResponses($db, 'MAX', $i);
						echo '</td></tr>';
					}	
				?>
			</tbody>
		</table>
	</div>
	<div class="pie-container">
		<div class="age">
			<h4>Age Ranges of Participants</h4>
			<input type="hidden" id="age-values" value='<?php echo getValues($db, "age") ?>'>
			<div class="chart" data-type="age"></div>
		</div>
		<div class="sex">
			<h4>Sexes of Participants</h4>
			<input type="hidden" id="sex-values" value='<?php echo getValues($db, "sex") ?>'>
			<div class="chart" data-type="sex"></div>
		</div>
		<div class="usage">
			<h4>Usage by Participants</h4>
			<input type="hidden" id="amount-values" value='<?php echo getValues($db, "amount") ?>'>
			<div class="chart" data-type="amount"></div>
		</div>
	</div>

	<?php } ?>
</main>
<footer>
	
</footer>

		
<?php require_once 'core/template/footer.inc.php'; ?>