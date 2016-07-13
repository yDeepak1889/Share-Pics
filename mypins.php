<?php
	@require('core.php');
	if(!check_login()) {
		header('Location:index.php');
	}else {
		@require('db_connect.php');
		@require('fetch.php');
		@require('navbar.php');
?>

<section id = "mypins">
	<div class = "container">
		<div class = "row">
		</div>
	</div>

</section>

</body>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
     <script src="js/wow.min.js"></script>
              <script>
              new WOW().init();
              </script>

    <script>
      console.log(<?php echo $_SESSION['token_id']; ?>);
    </script>

</html>

<?php
	if(isset($_SESSION['token_id'])) {
?>

<script type="text/javascript">
	var token = "<?php echo $_SESSION['token_id']; ?>";
	fetch_data(token);
</script>

<?php
	}
?>









<?php

	}
?>