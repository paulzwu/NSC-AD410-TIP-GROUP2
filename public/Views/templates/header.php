<?PHP
error_reporting(E_ALL);
ini_set('display_errors', 1);

require '../vendor/autoload.php';

use Core\View;

session_start();

$agetitle = 'Tip';
$username = 'Kari';
$usertype = 'admin';
$waitingOn = 45;
$totalFaculty = 200;

//openOrCreateDB();

// $username = App\Models\AdminDash::getUser();

// if (!defined('CANVAS_USERNAME') || defined('CANVAS_USERNAME') && $username !== $_SESSION[CANVAS_USERNAME]) {
//     View::render('Login.php');
// } else {
//     openOrCreateDB();
// }
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
