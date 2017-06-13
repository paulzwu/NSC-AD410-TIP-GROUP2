<?php 
ob_start();
session_start(); 
//for oauth, this line session_start must be at the top!
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'config.php';
include 'dbUserHelper.php';
include 'db_connect.php';
require '../vendor/autoload.php';

$pagetitle = 'Tip';
$username = 'Kari';
$usertype = 'admin';
// $oauthID = '';

// use smtech\OAuth2\Client\Provider\CanvasLMS;
// use GuzzleHttp\Client;

// define('CODE', 'code');
// define('STATE', 'state');
// define('STATE_LOCAL', 'oauth2-state');
// define('OAUTH_ID', 'oauth-id');

// if (isset($_GET['error'])) {
//     header('Location: http://markpfaff.com/projects/NSC-AD410-TIP-GROUP2/public/');
//     exit();
// }
// if (!isset($_SESSION[OAUTH_ID]) || empty($_SESSION[OAUTH_ID])) {
//     $provider = new CanvasLMS([
//         'clientId' => $config['canvasClientId'] ,
//         'clientSecret' => $config['canvasClientSecret'],
//         'purpose' => 'tip',
//         'redirectUri' => $config['redirectUri'],
//         'canvasInstanceUrl' => $config['canvasInstanceUrl']
//     ]);
//     $c = new Client(['verify'=>false]);
//     $provider->setHttpClient($c);

//     /* if we don't already have an authorization code, let's get one! */
//     if (!isset($_GET[CODE])) {
//         $authorizationUrl = $provider->getAuthorizationUrl();
//         $_SESSION[STATE_LOCAL] = $provider->getState();
//         header("Location: $authorizationUrl");
//         exit();

//     /* check that the passed state matches the stored state to mitigate cross-site request forgery attacks */
//     } elseif (empty($_GET[STATE]) || $_GET[STATE] !== $_SESSION[STATE_LOCAL]) {
//         unset($_SESSION[STATE_LOCAL]);
//         exit('Invalid state');

//     } else {
//         $_SESSION[CODE] = $_GET[CODE];
//         $token = $provider->getAccessToken('authorization_code', [CODE => $_GET[CODE]]);
//         $ownerDetails = $provider->getResourceOwner($token);
//         $oauth_id = $ownerDetails->getId();
//         $name = $ownerDetails->getName();

//         $domain = 'northseattle.test.instructure.com';
//         $profile_url = 'https://' . $domain . '/api/v1/users/' . $oauth_id . '/profile?access_token=' . $token;
//         $f = @file_get_contents($profile_url);
//         $profile = json_decode($f);
//         $email = $profile->primary_email;

//         $_SESSION[OAUTH_ID] = $oauth_id;
//         $userInfo = getUser($connection, $oauth_id);
//         if (empty($userInfo['userInfo'])) {
//             insertUser($connection, $oauth_id, $name, $email);
//         }
//         $oauthID = $oauth_id;
//     }
// }
// if (!isset($_SESSION[OAUTH_ID])) {
//     $_SESSION[OAUTH_ID] = $oauthID;    
// }
// if (isset($_GET[CODE]) || isset($_GET[STATE])) {
//     header('Location: http://markpfaff.com/projects/NSC-AD410-TIP-GROUP2/public/');
//     exit();
// }
// $userInfo = getUser($connection, $_SESSION[OAUTH_ID]);
// if (!empty($userInfo['userInfo'])) {
//     $user = $userInfo['userInfo'][0];
//     $username = $user['name'];
//     $usertype = $user['userType'];
// }

openOrCreateDB();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?php echo $pagetitle;?></title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- BASE STYLES FOR SITE | DO NOT ERASE -->

     <!-- DASHBOARD CSS !!! REQUIRED-->
     <link rel="stylesheet" type="text/css" href="assets/css/light-bootstrap-dashboard.css">
     <!-- CORE BOOTSTRAP CSS !!! REQUIRED-->
	 <!-- <script src="assets/js/bootstrap.min.js" type="text/javascript"></script> -->
      <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
     <!-- NAVBAR ICONS !!! REQUIRED-->
     <link rel="stylesheet" type="text/css" href="assets/css/pe-icon-7-stroke.css">
     <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
     <!-- <link rel="stylesheet" type="text/css" href="assets/css/jquery-ui.min.css"> -->
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.jqueryui.min.css">
     <!-- FONTS !!! REQUIRED-->
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Khula:700|Open+Sans">

    <!-- END  STYLES FOR SITE -->


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
