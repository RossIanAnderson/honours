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
	
	$ageArr = array('err', '12-17', '18-24', '25-34', '35-44', '45-54', '55-64', '65-74');
	$sexArr = array('err', 'female', 'male', 'other', 'prefer to not say');
	$ageVal = @(int)$_POST['age'];
	$sexVal = @(int)$_POST['sex'];
	$age = $ageArr[ $ageVal ];
	$sex = $sexArr[ $sexVal ];
	
	if( $ageVal === 0 || $sexVal === 0 ){
		output('Error', 'Please choose and option from each dropdown.');
	}	
	else {
		output('Success', 'All choices');
	}