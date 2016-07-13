<?php
  @require('core.php');

  if(!check_login()) {

    header('Location:login.php');

  }else {

         @require('db_connect.php');
         @require('fetch.php');
	       require('navbar.php');
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
</html>

<?php

    $query = "SELECT `token` FROM `users` WHERE 1";
    $query_run = mysqli_query($db_link, $query);
    if($query_run) {

      $data = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
      $data = json_encode($data);
      echo "<script> var arr = ".$data.";</script>";
    }

?>
<script type="text/javascript">
  
  var len = arr.length;
  //console.log(arr);
  var i = 0;
  for (i = 0; i < len ; i++) {
    var token = arr[i]['token'];
    console.log(token);
    fetch_data(token);
  }


</script>


<?php

  }
?>

