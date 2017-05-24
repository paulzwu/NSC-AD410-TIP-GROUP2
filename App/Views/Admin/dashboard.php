<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Admin Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    

    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

    <!-- Custom CSS Defenitions -->
    <link rel="stylesheet" href="assets/css/styles.css">

    <!--     Fonts and icons     -->
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Khula:700|Open+Sans" rel="stylesheet">
</head>
<body>
<div class="wrapper">
<div class="sidebar" data-color="azure">
            <div class="sidebar-wrapper">
            <div class="logo">
                <a href="/admin"><img src="assets/img/alt_logo.png" alt="NSC Logo" height="45" width="55"></a>
                <span>Welcome, <?php echo htmlspecialchars($name); ?></span>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="admin">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="edit">
                        <i class="pe-7s-note2"></i>
                        <p>TIP Editor</p>
                    </a>
                </li>
                <li>
                    <a href="adminfaq">
                        <i class="pe-7s-news-paper"></i>
                        <p>FAQs</p>
                    </a>
                </li>
                <li>
                    <a href="support">
                        <i class="pe-7s-science"></i>
                        <p>Support</p>
                    </a>
                </li>
                <li>
            </ul>
        </div>
    </div>

<!-- Tool Bar -->
<div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
                                        Quick Reports
                                        <b class="caret"></b>
                                    </p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Report 1</a></li>
                                <li><a href="#">Report 2</a></li>
                                <li><a href="#">Report 3</a></li>
                                <li><a href="#">Report 4</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Export</a></li>
                              </ul>
                        </li>
                        <li>
                            <a href="#">
                                <p>Log out</p>
                            </a>
                        </li>
                        <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Tool Bar -->
        <!-- Main Content -->
         <div class="content">
            <div class="container-fluid">

             <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">TIP Submission Rates</h4>
                                <p class="category">Total Responses Expected: <?php echo $totalFaculty ?></p>
                                <p class="category">Waiting On: <?php echo $waitingOn ?></p>
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


<?php include("search_grid.php") ?>
    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>


    <!-- Footer-->
    <footer class="container-fluid" 
            style="min-height:200px; background-color:#18bc9c;color:#fff;text-align:center;padding-top:50px;">
        © 2017 ADBAS PROGRAM | NORTH SEATTLE COLLEGE
    </footer>

</div>
</body>

    <!--   Core JS Files   -->
    <script src="assets/js/lib/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="assets/js/light-bootstrap-dashboard.js"></script>
    <script src="assets/js/responsive_nav.js"></script>

    <!-- Response Rate Assets -->
   <script src="assets/js/lib/raphael-2.1.4.min.js"></script>
    <script src="assets/js/lib/justgage.js"></script>
    <script src="assets/js/tipprogress.js"></script>
    

   
</html>


