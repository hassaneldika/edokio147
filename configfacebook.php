<?php

require_once 'vendorSocilaMedia/autoload.php';

if (!session_id())
{
    session_start();
}

// Call Facebook API

$facebook = new \Facebook\Facebook([
  'app_id'      => '1058457328341510',
  'app_secret'     => '2dc9e0f9d8c1641bd703f3123043e065',
  'default_graph_version'  => 'v2.10'
]);



//config.php

//Include Google Client Library for PHP autoload file


//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('711935556108-ag2u8bd7i5dbtndslhg9iqihb0bvt57d.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('https://edokio.com/');

//
$google_client->addScope('email');

$google_client->addScope('profile');

//start session on web page
session_start();

?>
