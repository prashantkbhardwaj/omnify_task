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
  $successUrl = "http://ec2-13-127-113-67.ap-south-1.compute.amazonaws.com/index.php/success?token=".$_SESSION['access_token'];
  header('Location: ' . filter_var($successUrl, FILTER_SANITIZE_URL));
}

