<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootflat.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
    <link href="css/tagtacular.css?donotcache=20130703" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Khula:700|Open+Sans" rel="stylesheet">
</head>
<body>

<!--NAVBAR-->
<?php include("navbar.php"); ?>
<div class="container-fluid">
    <!--Quick Glace Completion Status and Quick Report List-->
    <?php include("tip_response_status.php"); ?>
   
    <!-- Data Filters -->
    <?php include("filter.php");?>
            <div class="row">
                <?php include("datagrid.php"); ?>
            </div>
</div>
    <!-- Footer-->
    <footer
            style="min-height:200px; background-color:#18bc9c;color:#fff;text-align:center;padding-top:50px;">
        © 2017 ADBAS PROGRAM | NORTH SEATTLE COLLEGE
    </footer>


<script type="text/javascript" src="assets/js/lib/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="assets/js/custom.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-2.2.4/dt-1.10.15/datatables.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
<script src="assets/js/lib/raphael-2.1.4.min.js"></script>
<script type="text/javascript" src="assets/js/lib/d3.min.js"></script>
<script src="assets/js/lib/justgage.js"></script>
<script src="assets/js/lib/data_filters.js"></script>
<script src="assets/js/tipprogress.js"></script>
<script src="assets/js/datagrid.js"></script>
</body>
</html>
