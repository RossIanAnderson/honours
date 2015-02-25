<?php
	
	require '../init.php';
	
	$ageArr = array('err', '12-17', '18-24', '25-34', '35-44', '45-54', '55-64', '65-74');
	$sexArr = array('err', 'female', 'male', 'other', 'prefer to not say');
	$ageVal = @(int)$_POST['age'];
	$sexVal = @(int)$_POST['sex'];
	$smVal = @(int)$_POST['sm'];
	$age = $ageArr[ $ageVal ];
	$sex = $sexArr[ $sexVal ];
	
	if( $ageVal === 0 || $sexVal === 0 || $smVal === 0 ){
		output(0, 'Please choose and option from each dropdown.');
	}	
	else {
		$userInfo = array(
			"age" => $ageVal,
			"sex" => $sexVal,
			"sm"  => $smVal
		);
		$_SESSION['userInfo'] = $userInfo;
		output(1, 'Success');
	}