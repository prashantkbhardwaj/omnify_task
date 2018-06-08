<?php
if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
  echo $redirect; die();
//  header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
}
?>