<?php
	
	session_start();
	ob_start();
		
	// Configuration
	$db_config = array(
		'driver' => 'mysql',
		  'host' => 'localhost',
		  'name' => 'honours',
		  'user' => 'root',
		  'pass' => 'root'
	);
	
	// Connect	
	try {
		$db = new PDO($db_config['driver'] . ":host=" . $db_config['host'] . ";dbname=" . $db_config['name'],$db_config['user'],$db_config['pass']);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
		die();
	}
	
	// General Functions
	
	// Simple redirection
	function redirect($url){
		header('Location: ' . $url);
	}
	
	// Sets up restrictions
	function restrictedAdmin(){
		if( empty($_SESSION['admin'])){
			redirect('.');
		}
	}
	
	function restrictedQuestionnaire(){
		if( empty( $_SESSION['userInfo'] ) ){
			redirect('.');
		}
	}
	
	// Format output for AJAX form submission
	function output($status, $message){
		echo json_encode(
			array(
				"status"  => $status,
				"message" => $message
			)
		);
	}

?>