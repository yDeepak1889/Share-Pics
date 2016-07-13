<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db_name = "phogger";

	$db_link = mysqli_connect($host, $user, $pass, $db_name);

	if(mysqli_connect_errno()) {
		printf("ERROR: %s\n",mysqli_connect_error());
		exit();
	}

	if(!$db_link || !@mysqli_select_db($db_link, $db_name)) {
		exit("Error: Access Denied\n");
	}else {
		//echo "Success\n";
	}
?>