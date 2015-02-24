<?php	
	
	// Sets up restrictions
	function restricted(){
		if(!isset($_SESSION['admin'])){
			header('Location: index.php');
		}
	}