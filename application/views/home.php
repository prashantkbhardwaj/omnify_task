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

?>

<div>
    <?php
    /*
     * If login url is there then display login button
     * else print the retieved data
    */
    if (isset($authUrl)) {
        echo "<a class='login' href='" . $authUrl . "'><img src='gplus-lib/signin_button.png' height='50px'/></a>";
    } else {
      echo "<a class='logout' href='?logout'><button>Logout</button></a>";
    }
    ?>
</div>