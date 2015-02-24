<?php
	
	// Format output for AJAX form submission
	function output($status, $message){
		echo json_encode(
			array(
				"status"  => $status,
				"message" => $message
			)
		);
	}
		
	$username = @$_POST['u'];
	$password = @$_POST['p'];
	
	if($username === '' || $password === ''){
		output('fail', 'Please enter a username and password.'); 
	}
