<?php
		//restrict this page to only a person logedIn
		//check if the session is set
		if (!isset($_SESSION['name'])) {
			# code...
			//when not set
			//we take to the login
			header('location:login.php');
		}
		//else tell no access - take to create account

?>
