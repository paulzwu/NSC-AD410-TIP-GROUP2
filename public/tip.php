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

openOrCreateDB();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?php echo $pagetitle;?></title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

<!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />



    <!-- Custom CSS Defenitions -->
    <link rel="stylesheet" href="assets/css/styles.css">

    <!--     Fonts and icons     -->
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Khula:700|Open+Sans" rel="stylesheet">

    <!-- Survey JS-->
      <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
      <script src="assets/js/lib/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.3.0/knockout-min.js"></script>
      <link href="https://surveyjs.azureedge.net/0.12.16/surveyeditor.css" type="text/css" rel="stylesheet" />
      <script src="https://surveyjs.azureedge.net/0.12.16/survey.ko.min.js"></script>
      <script src="https://surveyjs.azureedge.net/0.12.16/surveyeditor.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.6/ace.js" type="text/javascript" charset="utf-8"></script>
      <link rel="stylesheet" href="assets/css/editor_snackbar.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.0/worker-json.js" type="text/javascript"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.0/mode-json.js" type="text/javascript"></script>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
     <!-- NAVBAR ICONS !!! REQUIRED-->
     <link rel="stylesheet" type="text/css" href="assets/css/pe-icon-7-stroke.css">
     <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
     <link rel="stylesheet" type="text/css" href="assets/css/jquery-ui.min.css">
     <!-- FONTS !!! REQUIRED-->
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Khula:700|Open+Sans">
</head>
<body>
    <div class="wrapper">
        <div class="sidebar" data-color="azure">
            <div class="sidebar-wrapper">
            <div class="logo">
                <a href="index.php"><img src="assets/img/alt_logo.png" alt="NSC Logo" height="45" width="55"></a>
                <span>Welcome, <?php echo htmlspecialchars($username); ?></span>
            </div>

            <?php

            if ($usertype == 'admin'){
                include 'Views/templates/nav-admin.php';
                // include 'Views/templates/toolbar-admin.php';
                include 'Views/templates/tip_editor_toolbar.php';
            }else{
                include 'Views/templates/nav-faculty.php';
                include 'Views/templates/toolbar-faculty.php';
            }
            ?>
  <!-- Maiin Content -->
  <div class="tip-title"><h3>TIP Assessment</h3></div>
  <div id="container" class="col-md-6 col-lg-6 col-sm-12 tip-container"></div>
  <div id="snackbar"></div>
  <script src="assets/js/tip_viewer.js" type="text/javascript"></script>
<!-- Footer-->
<footer>
    © 2017 ADBAS PROGRAM | NORTH SEATTLE COLLEGE
</footer>


<!--   Core JS Files   -->
<script src="assets/js/light-bootstrap-dashboard.js"></script>
<script src="assets/js/responsive_nav.js"></script>
</body>
</html>
