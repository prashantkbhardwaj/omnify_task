<?php

require_once APPPATH.'/gplusConfig.php';

if (isset($_REQUEST['logout'])) {
   session_unset();
}


if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
  header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));

  if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
    $successUrl = "http://ec2-13-127-113-67.ap-south-1.compute.amazonaws.com/index.php/success?token=".$_SESSION['access_token'];
    header('Location: ' . filter_var($successUrl, FILTER_SANITIZE_URL));
  } else {
    // get the login url   
    $authUrl = $client->createAuthUrl();
    if (isset($authUrl)) {
        echo "<a class='login' href='" . $authUrl . "'><img src='gplus-lib/signin_button.png' height='50px'/></a>";
     }// else {
    //     print "ID: {$id} <br>";
    //     print "Name: {$name} <br>";
    //     print "Email: {$email } <br>";
    //     print "Image : {$profile_image_url} <br>";
    //     print "Cover  :{$cover_image_url} <br>";
    //     print "Url: {$profile_url} <br><br>";
    //     echo "<a class='logout' href='?logout'><button>Logout</button></a>";
    // }
  }
}

