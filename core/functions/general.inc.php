<?php	
	
	// Sets up restrictions
	function restrictedAdmin(){
		if( empty($_SESSION['admin'])){
			header('Location: index.php');
		}
	}
	
	function restrictedQuestionnaire(){
		if( empty( $_SESSION['userInfo'] ) ){
			header("Location: .");
		}
	}