<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require '../vendor/autoload.php';
include 'db_connect.php';
include 'config.php';
include 'dbUserHelper.php';

use smtech\OAuth2\Client\Provider\CanvasLMS;
use GuzzleHttp\Client;

//anti-fat-finger constant definitions 
define('CODE', 'code');
define('STATE', 'state');
define('STATE_LOCAL', 'oauth2-state');
define('PROVIDER', 'provider');

$provider = new CanvasLMS([
    'clientId' => $config['canvasClientId'] ,
    'clientSecret' => $config['canvasClientSecret'],
    'purpose' => 'tip',
    'redirectUri' => $config['redirectUri'],
    'canvasInstanceUrl' => $config['canvasInstanceUrl']
]);
$_SESSION[PROVIDER] = $provider;
$c = new Client(['verify'=>false]);
$provider->setHttpClient($c);

/* if we don't already have an authorization code, let's get one! */
if (!isset($_GET[CODE])) {
    $authorizationUrl = $provider->getAuthorizationUrl();
    $_SESSION[STATE_LOCAL] = $provider->getState();
    header("Location: $authorizationUrl");
    exit();
/* check that the passed state matches the stored state to mitigate cross-site request forgery attacks */
} elseif (empty($_GET[STATE]) || $_GET[STATE] !== $_SESSION[STATE_LOCAL]) {
    unset($_SESSION[STATE_LOCAL]);
    exit('Invalid state');
} else {
	$_SESSION[CODE] = $_GET[CODE];
	$_SESSION[PROVIDER] = $provider;
//	$token = $provider->getAccessToken('authorization_code', [CODE => $_GET[CODE]]);
//	$ownerDetails = $provider->getResourceOwner($token);
//	$oauth_id = $ownerDetails->getId();
	$_SESSION['oauth_id'] = '32087438247';
}

?>