<html>
<body>

<H1> Teaching Improvement Practice (TIP)</H1>

<h2> Authenticated By Canvas </h2>

<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
// include "App\Config.php";

require_once "../vendor/autoload.php";

use smtech\OAuth2\Client\Provider\CanvasLMS;
use GuzzleHttp\Client;

//echo 'http://' . $_SERVER['SERVER_NAME'] . '/' . $_SERVER['SCRIPT_NAME'];
//exit;
session_start();

/* anti-fat-finger constant definitions */
define('CODE', 'code');
define('STATE', 'state');
define('STATE_LOCAL', 'oauth2-state');

$provider = new CanvasLMS([
    'clientId' => $config['canvasClientId'] ,
    'clientSecret' => $config['canvasClientSecret'],
    'purpose' => 'tip',
    'redirectUri' => $config['redirectUri'],
    'canvasInstanceUrl' => $config['canvasInstanceUrl']
//'redirectUri' => 'http://' . $_SERVER['SERVER_NAME'] . '/' . $_SERVER['SCRIPT_NAME'],
//'redirectUri' => 'http://localhost:63342/'.$_SERVER['SCRIPT_NAME'],
//'canvasInstanceUrl' => 'https://northseattle.test.instructure.com'
]);
$c = new Client(['verify'=>false]);
$provider->setHttpClient($c);

/* if we don't already have an authorization code, let's get one! */
if (!isset($_GET[CODE])) {
    $authorizationUrl = $provider->getAuthorizationUrl();
    $_SESSION[STATE_LOCAL] = $provider->getState();
    header("Location: $authorizationUrl");
    exit;

    /* check that the passed state matches the stored state to mitigate cross-site request forgery attacks */
}/* elseif (empty($_GET[STATE]) || $_GET[STATE] !== $_SESSION[STATE_LOCAL]) {
    unset($_SESSION[STATE_LOCAL]);
    exit('Invalid state');

}*/ else {
    echo $_GET[CODE];
    /* try to get an access token (using our existing code) */
    $token = $provider->getAccessToken('authorization_code', [CODE => $_GET[CODE]]);
    echo "Good, I got a token so I can do things on behave of you <br/>";
    /* do something with that token... (probably not just print to screen, but whatevs...) */
    echo "token:", $token->getToken(), "<br/>";
    $ownerDetails = $provider->getResourceOwner($token);

    // Use these details to create a new profile
    printf('Your Name: %s <br/>', $ownerDetails->getName());
    printf('Your id: %s <br/>', $ownerDetails->getId());
    //printf('email: %s! <br/>', $ownerDetails->getEmail());
    $uid= $ownerDetails->getId();

    $domain = 'northseattle.test.instructure.com';

    $profile_url = 'https://' . $domain . '/api/v1/users/' . $uid . '/profile?access_token=' . $token;
    //echo $profile_url;
    $f = @file_get_contents($profile_url);
    //$list = json_decode($f);
    //echo $f;
    $profile = json_decode($f);

    echo "Your email is: ", $profile->primary_email;
        //https://northseattle.test.instructure.com/api/v1/users/3901027/profile

//exit;
}
