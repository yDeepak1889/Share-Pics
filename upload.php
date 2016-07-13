<?php
	@require('core.php');
	if(!check_login()) {
		header('Location:index.php');
	}else {

?>
<?php
	require('db_connect.php');
?>

<?php
	$error ="";
	$success = "";
	if(isset($_SERVER['REQUEST_METHOD']) == "POST") {

		if(isset($_FILES['image'])) {
			$name = $_FILES['image']['name'];
			$size = $_FILES['image']['size'];
			$temp = $_FILES['image']['tmp_name'];
			$type = $_FILES['image']['type'];

			$extension = explode('.', $name);
			$extension = end($extension);
			$extension = strtolower($extension);

			$expect_ex =array('jpeg','png','jpg','gif');
			
			if(in_array($extension, $expect_ex) == false) {
				$error = $extension." EXtension doesn't allowed\n";
			}else if($size > 2097152){
				$error = "File Size is too large\n";
			}else if (file_exists('images/'.$name)){
				$error = "File With same name already exist ...Please change File name and try again\n";
			}  else {
				
				if(isset($_POST['desc']) && !empty($_POST['desc'])) {

					$desc = $_POST['desc'];
					$desc = trim($desc);
					$desc = stripcslashes($desc);
					$desc = htmlentities($_POST['desc']);
				}else {
					$desc = " ";
				}

				$token =  $_SESSION["token_id"];

				$query = "INSERT INTO `images` (`token`, `img_name`, `description`) VALUES ($token,'". mysqli_real_escape_string($db_link,$name)."','".mysqli_real_escape_string($db_link, $desc)."')";
				//$query = "INSERT INTO `images` (`token`,`img_name`,`description`) VALUES (\'".mysqli_real_escape_string($db_link,$token)."\', \'".mysqli_real_escape_string($db_link, $name,)."\', \'".mysqli_real_escape_string($db_link, $desc)."\')";
				//echo $query;
				//echo "<script> console.log('" . $query."');</script>";

				$query_run = @mysqli_query($db_link, $query);
				if(!$query_run) {
					$error = mysqli_error($db_link);
				}

				
				if(empty($error)){
					//echo $temp;
					 move_uploaded_file($temp, 'images/'.$name);
						$success = "Uploaded Successfully\n";
				}
			}
		}
	} 
?>


<?php
	require("navbar.php");
?>


	<!-- ********************INPUT FORM *********************-->

	<section id = "input_file">

		<div class = "container">

			<form   role = "form" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "POST" enctype = "multipart/form-data">
				<div class = "row">

					<div class = "col-md-8 col-md-offset-2">
						<span class = "error"><?php if(isset($error) && !empty($error)) {echo $error;} ?></span>
						<span class = "success"><?php if(isset($success) && !empty($success)) {echo $success;} ?></span>
						<input class= "filestyle" type = "file" name = "image" required>

					</div>

				</div>

				<div class = "row">
					
					<div class = "form-group">

						<div class = "col-md-2">
							<label class = "control-label">Description: </label>
						</div>

						<div class = "col-md-8">

							<textarea class = "form-control" name = "desc" type = "text" cols = "30" rows = "10"></textarea>

						</div>

					</div>

				</div>

				<div class = "row">
					<div class = "col-md-2 col-md-offset-2">
						<input type = "submit" class = "btn btn-default" value = "Upload">
					</div>
				</div>

				

			</form>

		</div>

	</section>
	
	

</body>
	
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-filestyle.min.js"> </script>
    <script src="js/wow.min.js"></script>
              <script>
              new WOW().init();
              </script>

     <!--Change Title of page-->

     <script>
    	
    	document.title = "Upload"

    </script>

    <!-- TITLE END-->


    <script type="text/javascript">

    	$('.row:eq(0)').css('padding-top','3%');

    </script>


    <?php
    	if(isset($_POST['desc'])) {
    		unset($_POST['desc']);
    	}

    	if(isset($_FILES['image'])) {
    		unset($_FILES['image']);
    	}
    ?>
</html>

<?php
	}
?>