<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Taviraj|Work+Sans" rel="stylesheet">
</head>
<body>

<!--NAVBAR-->
<?php include("navbar.php"); ?>

<!--Quick Glace Completion Status-->
<?php include("landing_dash.php"); ?>

<!--Reports-->
<div class="content-wrapper">
    <section id="reports">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-left">
                    <h2>Quick Reports</h2>
                    <hr>
                </div>
            </div>
            <div class="row">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#SS">Submission Status</a></li>
                    <li><a data-toggle="tab" href="#LOD">Learning Outcomes by Division</a></li>
                    <li><a data-toggle="tab" href="#ROD">Response Rates By Division</a></li>
                    <li><a data-toggle="tab" href="#ET">Emerging Trends</a></li>
                </ul>
                <div class="tab-content">
                    <div id="SS" class="tab-pane fade in active">
                        <hr>
                        <p>Retrieve contact info and response status for faculty to easily send completion
                            reminders.</p>
                        <button class="btn btn-info"><a href="report1">Export</a></button>
                    </div>
                    <div id="LOD" class="tab-pane fade">
                        <hr>
                        <p>See how frequently learning outcomes are being addressed by each
                            division.</p>
                        <button class="btn btn-info">Export</button>
                    </div>
                    <div id="ROD" class="tab-pane fade">
                        <hr>
                        <p>View assessment response rates by each division.</p>
                        <button class="btn btn-info">Export</button>
                    </div>
                    <div id="ET" class="tab-pane fade">
                        <hr>
                        <p>See what topics are being addressed most in assessment responses.</p>
                        <button class="btn btn-info">Export</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
          <div class="row" id="filters">
              <?php
              include("filter.php");
                ?>
              </div>
            <div class="row">
                <?php include("datagrid.php"); ?>
            </div>
        </div>
    </section>

    <!-- Footer-->
    <footer class="container-fluid"
            style="min-height:200px; background-color:#18bc9c;color:#fff;text-align:center;padding-top:50px;">
        © 2017 ADBAS PROGRAM | NORTH SEATTLE COLLEGE
    </footer>

</div>
<script type="text/javascript" src="assets/js/lib/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="assets/js/custom.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-2.2.4/dt-1.10.15/datatables.min.js"></script>
<script src="assets/js/lib/raphael-2.1.4.min.js"></script>
<script type="text/javascript" src="assets/js/lib/d3.min.js"></script>
<script src="assets/js/lib/justgage.js"></script>
<script src="assets/js/tipprogress.js"></script>
</body>
</html>
