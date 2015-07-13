<?php
	
	session_start();
	ob_start();
	
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
				
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
	
	function format($what, $val){
		switch($what) {
			case 'age':
				$ageArr = array('err', '12-17', '18-24', '25-34', '35-44', '45-54', '55-64', '65-74');
				return $ageArr[$val];
				break;
			case 'sex':
				$sexArr = array('err', 'female', 'male', 'other', 'prefer to not say');
				return $sexArr[$val];
				break;
			case 'usage':
				$usageArr = array('err', 'Multiple minutes in an hour', 'A few minutes an hour', 'Once an hour', 'Every few hours in a day', 'Less than every few hours in a day', 'Never');
				return $usageArr[$val];
				break;
		}
	}
	
	function  countParticipants($db){
		$sql = "SELECT COUNT(id) FROM responses";
		
		$query = $db->prepare( $sql );
		$query->execute();
		$result = $query->fetchColumn();
						
		return $result;
	}

	function getResponses($db, $what, $responseNum){
		$sql = "SELECT " . $what . "(response" . $responseNum . ") FROM responses";
		
		$query = $db->prepare( $sql );
		$query->execute();
		$results = $query->fetchAll( PDO::FETCH_ASSOC );
		
		$result = $results[0][$what . '(response' . $responseNum . ')'];
				
		return round($result);
	}

	function getResponse($db, $responseNum){
		$sql = "SELECT response" . $responseNum . " as response FROM responses";
		
		$query = $db->prepare( $sql );
		$query->execute();
		$results = $query->fetchAll( PDO::FETCH_ASSOC );				
		
		return $results;
	}

	function getValues($db, $what){
		
		$sql = "SELECT " . $what . " AS what, COUNT(*) AS count FROM responses GROUP BY " . $what . " ORDER BY count DESC";
		
		$query = $db->prepare( $sql );
		$query->execute();
		$results = $query->fetchAll( PDO::FETCH_ASSOC );
		
		return json_encode($results);
	}
	
	
	function checkIE(){
		
		if (preg_match('~MSIE|Internet Explorer~i', $_SERVER['HTTP_USER_AGENT']) || (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/7.0; rv:11.0') !== false)) {
			return true;
		}
		else {
			return false;
		}
	}
	
?>