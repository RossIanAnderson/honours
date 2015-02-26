<?php
	
	require '../init.php';
	
	$ageVal = @(int)$_POST['age'];
	$sexVal = @(int)$_POST['sex'];
	$usageVal = @(int)$_POST['usage'];
	
	if( $ageVal === 0 || $sexVal === 0 || $usageVal === 0 ){
		output(0, 'Please choose and option from each dropdown.');
	}	
	else {
		$userInfo = array(
			"age" => $ageVal,
			"sex" => $sexVal,
			"usage"  => $usageVal
		);
		$_SESSION['userInfo'] = $userInfo;
		output(1, 'Success');
	}