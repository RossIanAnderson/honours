<?php
	
	require '../init.php';
			
	$username = @$_POST['u'];
	$password = @$_POST['p'];
		
	if($username === '' || $password === ''){
		output(0, 'Please enter a username and password.');
	}
	else {
		$encrypted = sha1( $password );
		
		$sql = "SELECT * FROM admin WHERE username = :username";
		
		$query = $db->prepare( $sql );
		$query->execute( array( ':username'=>$username ) );
		$results = $query->fetchAll( PDO::FETCH_ASSOC );
		
		foreach( $results as $row ){ 
		    $password_hash = $row[ 'password' ];
		    if( $password_hash === sha1( $password )){
			    $_SESSION['admin'] = 'true';
			    output(1, 'Success');
		    }
		    else {
			    output(2, 'Username or password incorrect.');
		    }
		}
	}
