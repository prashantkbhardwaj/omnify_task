<?php

require_once APPPATH.'/gplus-lib/vendor/autoload.php';

const CLIENT_ID = '255852271059-3gs2qj8idfc4n2o2cugacppk10fkbmcb.apps.googleusercontent.com';
const CLIENT_SECRET = '_KnKc5SlcEWE0vbKmbgV_nsI';
const REDIRECT_URI = 'http://ec2-13-127-113-67.ap-south-1.compute.amazonaws.com/index.php/';

session_start();

$client = new Google_Client();
$client->setClientId(CLIENT_ID);
$client->setClientSecret(CLIENT_SECRET);
$client->setRedirectUri(REDIRECT_URI);
$client->addScope('email');
$client->addScope(Google_Service_Calendar::CALENDAR_READONLY);

$plus = new Google_Service_Plus($client);
$service = new Google_Service_Calendar($client);