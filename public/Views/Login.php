<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../config.php';

/*****************************************
Toggle this block to turn oauth on and off

******************************************/

require '../vendor/autoload.php';

//$pdo = (new SQLiteConnection())->connect();
//if ($pdo != null)
//    echo 'Connected to the SQLite database successfully!';
//else
//    echo 'Whoops, could not connect to the SQLite database!';

$pagetitle = 'Tip';
$username = 'Kari';
$usertype = 'admin';
$waitingOn = 45;
$totalFaculty = 200;

/*****************************************
Toggle this block to turn oauth on and off

******************************************/

use smtech\OAuth2\Client\Provider\CanvasLMS;
use GuzzleHttp\Client;

//echo 'http://' . $_SERVER['SERVER_NAME'] . '/' . $_SERVER['SCRIPT_NAME'];
//exit;

/* anti-fat-finger constant definitions */
define('CODE', 'code');
define('STATE', 'state');
define('STATE_LOCAL', 'oauth2-state');
define('CANVAS_USERNAME', 'canvas-username');
define('CANVAS_USERID', 'canvas-userid');
define('PROVIDER', 'provider');

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
} elseif (empty($_GET[STATE]) || $_GET[STATE] !== $_SESSION[STATE_LOCAL]) {
    unset($_SESSION[STATE_LOCAL]);
    exit('Invalid state');

} else {
	$token = $provider->getAccessToken('authorization_code', [CODE => $_GET[CODE]]);
	$ownerDetails = $provider->getResourceOwner($token);
	$uid = $ownerDetails->getId();

	$_SESSION[PROVIDER] = $provider;
    $_SESSION[CANVAS_USERNAME] = $ownerDetails->getName();
    $_SESSION[CANVAS_USERID] = $ownerDetails->getId();
    header('Location: markpfaff.com/projects/NSC-AD410-TIP-GROUP2/public/');
    exit;
    // echo $_GET[CODE];
    /* try to get an access token (using our existing code) */
    
    // echo "Good, I got a token so I can do things on behave of you <br/>";
    /* do something with that token... (probably not just print to screen, but whatevs...) */
    // echo "token:", $token->getToken(), "<br/>";
    

    // Use these details to create a new profile
    // printf('Your Name: %s <br/>', $ownerDetails->getName());
    // printf('Your id: %s <br/>', $ownerDetails->getId());
    //printf('email: %s! <br/>', $ownerDetails->getEmail());
    

    // $domain = 'northseattle.test.instructure.com';

    // $profile_url = 'https://' . $domain . '/api/v1/users/' . $uid . '/profile?access_token=' . $token;
    //echo $profile_url;
    // $f = @file_get_contents($profile_url);
    //$list = json_decode($f);
    //echo $f;
    // $profile = json_decode($f);

    // echo "Your email is: ", $profile->primary_email;
        //https://northseattle.test.instructure.com/api/v1/users/3901027/profile

exit;
}

?>
