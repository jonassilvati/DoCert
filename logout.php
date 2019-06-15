<?php 

	if (session_start()) {
		session_unset($_SESSION['id']);
		session_destroy();
	}

	header("Location:index.php");exit;
