<?php
	require('core.php');
?>
<?php
	require('basic.php');
?>
<?php
	if(check_login()) {
		unset($_SESSION['token_id']);
		unset($_SESSION['name_id']);
		session_destroy();
?>

<!-- <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>

 <script type="text/javascript">
        
          function onLoad() {
            gapi.load('auth2',function(){
              gapi.auth2.init();
            });
            logout();
          }

          function logout() {
            var auth2 = gapi.auth2.getAuthInstance();
            auth2.signOut().then(function () {
            	gapi.auth.setToken(null);
              //window.location = "index.php";
            });
          }

</script>-->

<?php
	}
	header('Location:index.php')
?>