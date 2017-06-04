<?PHP
error_reporting(E_ALL);
ini_set('display_errors', 1);
include  'config.php';
openOrCreateDB();
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
// use smtech\OAuth2\Client\Provider\CanvasLMS;
// use GuzzleHttp\Client;
// //echo 'http://' . $_SERVER['SERVER_NAME'] . '/' . $_SERVER['SCRIPT_NAME'];
// //exit;
// session_start();
// /* anti-fat-finger constant definitions */
// define('CODE', 'code');
// define('STATE', 'state');
// define('STATE_LOCAL', 'oauth2-state');
// $provider = new CanvasLMS([
//     'clientId' => $config['canvasClientId'] ,
//     'clientSecret' => $config['canvasClientSecret'],
//     'purpose' => 'tip',
//     'redirectUri' => $config['redirectUri'],
//     'canvasInstanceUrl' => $config['canvasInstanceUrl']
// //'redirectUri' => 'http://' . $_SERVER['SERVER_NAME'] . '/' . $_SERVER['SCRIPT_NAME'],
// //'redirectUri' => 'http://localhost:63342/'.$_SERVER['SCRIPT_NAME'],
// //'canvasInstanceUrl' => 'https://northseattle.test.instructure.com'
// ]);
// $c = new Client(['verify'=>false]);
// $provider->setHttpClient($c);
// /* if we don't already have an authorization code, let's get one! */
// if (!isset($_GET[CODE])) {
//     $authorizationUrl = $provider->getAuthorizationUrl();
//     $_SESSION[STATE_LOCAL] = $provider->getState();
//     header("Location: $authorizationUrl");
//     exit;
//     /* check that the passed state matches the stored state to mitigate cross-site request forgery attacks */
// } elseif (empty($_GET[STATE]) || $_GET[STATE] !== $_SESSION[STATE_LOCAL]) {
//     unset($_SESSION[STATE_LOCAL]);
//     exit('Invalid state');
// } else {
//     echo $_GET[CODE];
//     /* try to get an access token (using our existing code) */
//     $token = $provider->getAccessToken('authorization_code', [CODE => $_GET[CODE]]);
//     echo "Good, I got a token so I can do things on behave of you <br/>";
//     /* do something with that token... (probably not just print to screen, but whatevs...) */
//     echo "token:", $token->getToken(), "<br/>";
//     $ownerDetails = $provider->getResourceOwner($token);
//     // Use these details to create a new profile
//     // printf('Your Name: %s <br/>', $ownerDetails->getName());
//     // printf('Your id: %s <br/>', $ownerDetails->getId());
//     //printf('email: %s! <br/>', $ownerDetails->getEmail());
//     $uid= $ownerDetails->getId();
//     $domain = 'northseattle.test.instructure.com';
//     $profile_url = 'https://' . $domain . '/api/v1/users/' . $uid . '/profile?access_token=' . $token;
//     //echo $profile_url;
//     $f = @file_get_contents($profile_url);
//     //$list = json_decode($f);
//     //echo $f;
//     $profile = json_decode($f);
//     echo "Your email is: ", $profile->primary_email;
//         //https://northseattle.test.instructure.com/api/v1/users/3901027/profile
//exit;
// }
/*****************************************
Toggle this block to turn oauth on and off
******************************************/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" href="data:;base64,iVBORw0KGgo=">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?php echo $pagetitle;?></title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    

    <!-- BASE STYLES FOR SITE | DO NOT ERASE -->

    <!-- CORE BOOTSTRAP CSS !!! REQUIRED-->
     <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
     <!-- DASHBOARD CSS !!! REQUIRED-->
     <link rel="stylesheet" type="text/css" href="assets/css/light-bootstrap-dashboard.css">
     <!-- NAVBAR ICONS !!! REQUIRED-->
     <link rel="stylesheet" type="text/css" href="assets/css/pe-icon-7-stroke.css">
     <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
     <link rel="stylesheet" type="text/css" href="assets/css/jquery-ui.min.css">
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.jqueryui.min.css">
     <!-- FONTS !!! REQUIRED-->
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Khula:700|Open+Sans">

     <!-- Data Tables -->
         <link rel="stylesheet" type="text/css" href="assets/css/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.jqueryui.min.css">

    <!-- END  STYLES FOR SITE                   -->

            
</head>
<body>
    <div class="wrapper">
        <div class="sidebar" data-color="azure">
            <div class="sidebar-wrapper">
            <div class="logo">
                <a href="index.php"><img src="assets/img/alt_logo.png" alt="NSC Logo" height="45" width="55"></a>
                <span>Welcome, <?php echo $username; ?></span>
            </div>




            <?php 
            
            if ($usertype == 'admin'){
                include 'Views/templates/nav-admin.php';
                include 'Views/templates/toolbar-admin.php';
            }else{
                include 'Views/templates/nav-faculty.php';
                include 'Views/templates/toolbar-faculty.php';
            }
            ?>