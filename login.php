<?php
	require('core.php');

	if(check_login()) {

		header('Location:index.php');

	}else {
		require('basic.php');
?>

<body>

	<!-- log with google and facebook-->

	<section id = "login">

		<div class = "container">
			<div class = "row">

				<div id = "gsignin2" align = "center"></div>

			</div>


			<div class = "row">


			</div>

		</div>

	</section>

	<!--Login End-->

</body>


 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
     <script src="js/wow.min.js"></script>
              <script>
              	new WOW().init();
              </script>



     <!-- get google user data-->

     	<script type="text/javascript">

     		console.log("Success\n");

     		function onsignin(googleuser) {
     			var token = googleuser.getAuthResponse().id_token;
     			var info = googleuser.getBasicProfile();
     			var name = info.getName();
     			//console.log(token);
     			//console.log(name);
     			validate(token,name);
     			//var a= "<?php $_SESSION['gu'] = 111 ?>";
     			//window.location = "index.php";
     		}

     		function renderButton(){
     			gapi.signin2.render('gsignin2', {
     				'scope':'profile email',
     				'width':240,
     				'height':50,
     				'longtitle':true,
     				'theme':'dark',
     				'onsuccess':onsignin
     			});
     		}


     		function validate(token, name) {
     			var id = "347589018473-q1s8qrapthinccrcmvajgm95rr3uv2ar.apps.googleusercontent.com";
     			if(window.XMLHttpRequest) {
     				var xhttp = new XMLHttpRequest();
     			}else {
     				var xhttp = new ActiveXObject('Microsoft.XMLHTTP');
     			}

     			xhttp.onreadystatechange = function () {
     				if(xhttp.status == 200 && xhttp.readyState == 4) {
     					var ans = JSON.parse(xhttp.responseText);
     						console.log(ans);

     						if(ans.aud == id) {
     							var token_id = ans.sub;
     							//console.log(name);
     							//console.log(token_id);
     							//var a = '<?php $_SESSION["token"] ='+ token +';?>';
     							//var b = "<?php $_SESSION['name'] ="+name+";?>";
     						/***************************************************************************************/
     							$.post('core.php',{'token':token_id, 'name':name}, function(){	
     								var auth2 = gapi.auth2.getAuthInstance();
            							auth2.signOut();						
     								window.location = "index.php";													
     							});																					
     						/*****************************************************************************************/
     							
     						}

     				}
     			}

     			xhttp.open("POST",'https://www.googleapis.com/oauth2/v3/tokeninfo');
     			xhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
     			xhttp.send('id_token='+token);
     		}
     	</script>

</html>


<?php
	}
?>