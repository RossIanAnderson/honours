<?php require_once 'core/init.php'; ?>
<?php require_once 'core/template/header.inc.php'; ?>

<?php
	
	if (ini_get("session.use_cookies")) {
	    $params = session_get_cookie_params();
	    setcookie(session_name(), '', time() - 42000,
	        $params["path"], $params["domain"],
	        $params["secure"], $params["httponly"]
	    );
	}

	session_destroy();
	
	header("Location: index.php");

?>

<?php require_once 'core/template/footer.inc.php'; ?>