<?php
	session_start();
	ob_start();
	
	require('db_connect.php');

	if(isset($_POST['token']) && !empty($_POST['token']) && isset($_POST['name']) && !empty($_POST['name'])) {
		$_SESSION['token_id'] = $_POST['token'];
		$_SESSION['name_id'] = $_POST['name'];	
		update_db($_SESSION['name_id'], $_SESSION['token_id']);
	}

	//$_SESSION['name'] = "Deepak";
	//$_SESSION['token'] = "213313113313";
	

	function check_login() {
		if((isset($_SESSION['token_id']) && !empty($_SESSION['token_id'])) && (isset($_SESSION['name_id']) && !empty($_SESSION['name_id']))) {
			return true;
		}else {
			return false;
		}
	}


	/***********************CHECK USER IN DATA BASE AND IF NOT FOUND UPDATE DATABASE*****************************/


	function update_db($name, $token) {
		GLOBAL $db_link;
		$query = "SELECT `id` FROM `users` WHERE `token`=".mysqli_real_escape_string($db_link, $token);
		//echo $query;
		$query_run = mysqli_query($db_link, $query);
		if($query_run){
			$len = mysqli_num_rows($query_run);
		//	echo "<script>alert('success');</script>";
		//	echo '<br>'.$len;
			if(!$len) {
				$query = "INSERT INTO `users` (`token`, `name`) VALUES ('".mysqli_real_escape_string($db_link, $token)."','".mysqli_real_escape_string($db_link, $name)."')";
				//echo "<br>".$query;
				$query_run = mysqli_query($db_link, $query);
			}
		}
	}





	if(isset($_POST['token_id_fetch']) && !empty($_POST['token_id_fetch'])) {

		if(isset($_SESSION['token_id'])) {
			$token = $_POST['token_id_fetch'];
			$query = "SELECT `img_name`,`description` FROM `images` WHERE `token`=".$token;
			$query_run = mysqli_query($db_link, $query);
			if($query_run) {
				$arr = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
				 //print_r($arr);
				 echo json_encode($arr);
				 mysqli_free_result($query_run);
			}
		} 
	}
?>

