<?php
	require '../init.php';

	$sql = "SELECT * FROM items";
	
	$query = $db->prepare( $sql );
	$query->execute();
	$results = $query->fetchAll( PDO::FETCH_ASSOC );			

	echo json_encode( $results );

?>