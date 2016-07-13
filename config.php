<?php
include_once("inc/facebook.php"); //include facebook SDK
######### Facebook API Configuration ##########
$appId = '509604649240718'; //Facebook App ID
$appSecret = '2043644d9081a99ece1eabcb5e9f750c'; // Facebook App Secret
$homeurl = 'http://localhost:8080/projects/phogger/fb_login.php';  //return to home
$fbPermissions = 'ydeepak1889@gmail.com';  //Required facebook permissions

//Call Facebook API
$facebook = new Facebook(array(
  'appId'  => $appId,
  'secret' => $appSecret

));
$fbuser = $facebook->getUser();
?>