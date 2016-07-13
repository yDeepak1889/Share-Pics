<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-signin-client_id" content="347589018473-q1s8qrapthinccrcmvajgm95rr3uv2ar.apps.googleusercontent.com">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Home</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>


  <body>
    <!-- HERE GOES THE GOOGLE LOGIN-->
    <div class="g-signin2" align = "center" data-onsuccess="onSignIn"></div>


    <a href = "#" onclick = "signOut()">Sign Out</a>

  </body>

     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>

     <script src="js/wow.min.js"></script>
              <script>
              new WOW().init();
              </script>


      <script type="text/javascript">

       /* function onSignIn(googleUser) {
          var info = googleUser.getBasicProfile();
          var ID = info.getId();
          var name = info.getName();
          var img = info.getImageUrl();
          var email = info.getEmail();

          console.log(ID + " " + name + " " + img + " " + email);

        }

        function signOut() {
          var auth2 = gapi.auth2.getAuthInstance();
          console.log(auth2);
          auth2.signOut();
        }*/

      function onSignIn(googleUser) {
    
       var auth2 = gapi.auth2.getAuthInstance();
        if(auth2.isSignedIn.get()) {
          var info  = auth2.currentUser.get().getBasicProfile();
          var ID = info.getId();
          var name = info.getName();
          var img = info.getImageUrl();
          var email = info.getEmail();
          
          console.log(ID + " " + name + " " + img + " " + email);

          var id_token = googleUser.getAuthResponse().id_token;
          validate_data(id_token);
        //  console.log(id_token);
        }
      }

     function validate_data (id_token) {
        if(window.XMLHttpRequest) {
          var xhttp = new XMLHttpRequest();
        }else {
          var xhttp = new ActiveXObject('Microsoft.XMLHTTP');
        }


        xhttp.onreadystatechange = function () {
          if(xhttp.readyState == 4 && xhttp.status == 200) {
            var ans = xhttp.responseText;
            console.log(ans);
          }
        }

        xhttp.open('POST','https://www.googleapis.com/oauth2/v3/tokeninfo');
        xhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
        xhttp.send('id_token='+id_token);
     }
 
      </script>

</html>
