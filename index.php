<?php
	require('core.php');
	if (check_login()) {

		header('Location:home.php');
		
	}else {
		header('Location: login.php');
	}

?>