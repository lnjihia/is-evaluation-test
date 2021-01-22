<?php
	session_start();
	if (isset($_SESSION["LAST_ACTIVITY"])) {
		if (time() - $_SESSION["LAST_ACTIVITY"] > 1440) {
			session_unset();
			session_destroy();
			header('Location:' . URL . 'signin');
		} else {
			$_SESSION["LAST_ACTIVITY"] = time();
		}
	} else {
		header('Location:' . URL . 'signin');
	}
?>