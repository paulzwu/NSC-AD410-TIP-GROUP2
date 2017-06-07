<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include  '../../config.php';
openOrCreateDB();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="data:;base64,iVBORw0KGgo=">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"> -->
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Taviraj|Work+Sans" rel="stylesheet">
</head>
<body>
<!-- Main Content -->
<div class="content responses-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">TIP Submission Rates</h4>
                    </div>
                    <div class="content">
                        <div class="row">
                            <div class="col-lg-4 col-md-3 col-sm-4 col-xs-3">
                                <div id="complete" class="gauge"></div>
                            </div>
                            <div class="col-lg-4 col-md-3 col-sm-4 col-xs-3">
                                <div id="inprogress" class="gauge"></div>
                            </div>
                            <div class="col-lg-4 col-md-3 col-sm-4 col-xs-3">
                                <div id="notstarted" class="gauge"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<script type="text/javascript" src="../../assets/js/lib/jquery-3.2.1.min.js"></script>
<!-- <script type="text/javascript" src="../../assets/js/custom.js"></script> -->
<script src="../../assets/js/lib/raphael-2.1.4.min.js"></script>
<script type="text/javascript" src="../../assets/js/lib/d3.min.js"></script>
<script src="../../assets/js/lib/justgage.js"></script>
<script src="../../assets/js/tipprogress.js"></script>
<!-- Response Rate Assets -->
<script>
    var statsComplete = 0, statsInProgress = 0, statsNotStarted = 0;
    $(document).ready(function() {
                    // update dashboard gauges
                    complete.refresh(statsComplete);
                    inprogress.refresh(statsInProgress);
                    notstarted.refresh(statsNotStarted);
        
    });
</script>
</body>
</html>
