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

  $calendarId = 'primary';
  $optParams = array(
    'maxResults' => 10,
    'orderBy' => 'startTime',
    'singleEvents' => true,
    'timeMin' => date('c'),
  );
  $results = $service->events->listEvents($calendarId, $optParams);

  if (empty($results->getItems())) {
      print "No upcoming events found.\n";
  } else {
      print "Upcoming events:\n";
      foreach ($results->getItems() as $event) {
          $start = $event->start->dateTime;
          if (empty($start)) {
              $start = $event->start->date;
          }
          printf("%s (%s)\n", $event->getSummary(), $start);
      }
  }
  

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
        echo "<a class='login' href='" . $authUrl . "'><img src='http://ec2-13-127-113-67.ap-south-1.compute.amazonaws.com/application/gplus-lib/signin_button.png' height='70px'/></a>";
    } else {
        $successUrl = "http://ec2-13-127-113-67.ap-south-1.compute.amazonaws.com/index.php/success?name=".$name."&results=".$results;
        header('Location: ' . filter_var($successUrl, FILTER_SANITIZE_URL));
    }
    ?>
</div>

