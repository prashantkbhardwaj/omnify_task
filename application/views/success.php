<?php
require_once APPPATH.'/gplusConfig.php';

if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
  header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);
  $me = $plus->people->get('me');

  // Get User data
  $id = $me['id'];
  $name =  $me['displayName'];
  $email =  $me['emails'][0]['value'];
  $profile_image_url = $me['image']['url'];
  $cover_image_url = $me['cover']['coverPhoto']['url'];
  $profile_url = $me['url'];

} else {
  // get the login url   
  $authUrl = $client->createAuthUrl();
}


?>

<!-- HTML CODE with Embeded PHP-->
<div>
    <?php
    /*
     * If login url is there then display login button
     * else print the retieved data
    */
    if (isset($authUrl)) {
        echo "<a class='login' href='" . $authUrl . "'><img src='gplus-lib/signin_button.png' height='50px'/></a>";
    } else {
        print "ID: {$id} <br>";
        print "Name: {$name} <br>";
        print "Email: {$email } <br>";
        print "Image : {$profile_image_url} <br>";
        print "Cover  :{$cover_image_url} <br>";
        print "Url: {$profile_url} <br><br>";
        echo "<a class='logout' href='?logout'><button>Logout</button></a>";
    }
    ?>
</div>