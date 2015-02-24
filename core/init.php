<?php
	
	session_start();
	ob_start();
		
	// Get functions
	require_once 'core/functions/general.inc.php';
	
	/*
	
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
		$db_connect = new PDO($db_config['driver'] . ":host=" . $db_config['host'] . ";dbname=" . $db_config['name'],$db_config['user'],$db_config['pass']);
		$db_connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
		die();
	}

	*/
?>