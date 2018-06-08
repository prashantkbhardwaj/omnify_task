<?php
session_start();

//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '255852271059-3gs2qj8idfc4n2o2cugacppk10fkbmcb.apps.googleusercontent.com';
$clientSecret = '_KnKc5SlcEWE0vbKmbgV_nsI';
$redirectURL = 'http://ec2-13-232-60-95.ap-south-1.compute.amazonaws.com/login_with_google_using_php';

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to CodexWorld.com');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>