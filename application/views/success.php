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

  $results = $service->events->listEvents($calendarId, $optParams);

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
        echo "<a class='login' href='" . $authUrl . "'><img src='http://ec2-13-127-113-67.ap-south-1.compute.amazonaws.com/application/gplus-lib/signin_button.png' height='70px'/></a>";
    } else {
    	echo "<img src='".$profile_image_url."' height='70px'/>";
        print "<br>Hello {$name} <br>";
        if (empty($results->getItems())) {
		    echo "No upcoming events found.<br>";
		} else {
		    echo "Upcoming events:<br>";
		    foreach ($results->getItems() as $event) {
		        $start = $event->start->dateTime;
		        if (empty($start)) {
		            $start = $event->start->date;
		        }
		        echo "<br>".date("Y-m-d h:i:sa", strtotime($start))."<br>".$event->getSummary()."<br><br>";
		        //printf("%s (%s)\n", $event->getSummary(), $start);
		    }
		}
        echo "<a class='logout' href='?logout'><button>Logout</button></a>";
    }
    ?>
</div>