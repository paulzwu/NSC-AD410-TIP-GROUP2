<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Admin Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    

    <!-- Bootstrap -->
<!--     <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
    <link href="css/tagtacular.css?donotcache=20130703" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Khula:700|Open+Sans" rel="stylesheet"> -->

    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

    <!-- Custom CSS Defenitions -->
    <link rel="stylesheet" href="assets/css/styles.css">

<!-- Chartist -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">

        <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Khula:700|Open+Sans" rel="stylesheet">
</head>
<body>
<div class="wrapper">
<?php include("navbar.php") ?>
<?php include("main_panel.php") ?>
<?php include("search_grid.php") ?>


    <!-- Footer-->
    <!-- <footer
            style="min-height:200px; background-color:#18bc9c;color:#fff;text-align:center;padding-top:50px;">
        © 2017 ADBAS PROGRAM | NORTH SEATTLE COLLEGE
    </footer> -->

</div>
</body>
<!-- <script type="text/javascript" src="assets/js/lib/jquery-3.2.1.min.js"></script> -->
    <!--   Core JS Files   -->
<!--     <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/js/custom.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-2.2.4/dt-1.10.15/datatables.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
<script src="assets/js/lib/raphael-2.1.4.min.js"></script>
<script type="text/javascript" src="assets/js/lib/d3.min.js"></script>
<script src="assets/js/lib/justgage.js"></script>
<script src="assets/js/lib/data_filters.js"></script>
<script src="assets/js/tipprogress.js"></script>
<script src="assets/js/datagrid.js"></script> -->

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

    <!--  Charts Plugin -->
    <!-- <script src="assets/js/chartist.min.js"></script> -->
    <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="assets/js/light-bootstrap-dashboard.js"></script>

    <!-- Response Rate Assets -->
   <script src="assets/js/lib/raphael-2.1.4.min.js"></script>
    <script src="assets/js/lib/justgage.js"></script>
    <script src="assets/js/tipprogress.js"></script>
    <script src="assets/js/response_rate_pie_chart.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){

            // responseRate.initChartist();

            // $.notify({
            //     icon: 'pe-7s-gift',
            //     message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."

            // },{
            //     type: 'info',
            //     timer: 4000
            // });

        });
    </script>

   
</html>
