<?php

require_once APPPATH.'/gplusConfig.php';

if (isset($_REQUEST['logout'])) {
   session_unset();
}

if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);

} else {
  // get the login url   
  $authUrl = $client->createAuthUrl();
}


    if (isset($authUrl)) {
        echo "<a class='login' href='" . $authUrl . "'><img src='http://ec2-13-127-113-67.ap-south-1.compute.amazonaws.com/application/gplus-lib/signin_button.png' height='70px'/></a>";
    } else {
      echo "<a class='logout' href='?logout'><button>Logout</button></a>";
    }
    ?>