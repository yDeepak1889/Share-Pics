<?php
  require('basic.php');
?>
  <body>

    <!--********************************************NAVBAR*******************************-->

    <div class = "navbar navbar-default" role = "navigation" width= "100%">

      <div class = "container">

          <div class = "navbar-header">
            <button type = "button" class = "navbar-toggle" data-toggle = "collapse" data-target = "#mynavbar">

              <span class = "icon-bar"></span>
              <span class = "icon-bar"></span>
              <span class = "icon-bar"></span>

            </button>

            <div class = "navbar-brand">
              <div class = "logo">
                <p><?php if(isset($_SESSION['name_id']) && !empty($_SESSION['name_id'])) echo $_SESSION['name_id'];?></p>
              </div>
            </div>

          </div>


        <div class = "navbar-collapse collapse"  id = "mynavbar">
          <ul class = "nav navbar-nav navbar-right">

            <li><a href="index.php">Home</a></li>
            <li><a href = "mypins.php" >My Pins</a></li>
            <li><a href = "upload.php" >Upload Pin</a></li>
            <li><a href = "logout.php" >Log Out</a></li>

          </ul>
        </div>


      </div>

    </div>

<!-- ***************************NAVBAR END*************************************-->

  