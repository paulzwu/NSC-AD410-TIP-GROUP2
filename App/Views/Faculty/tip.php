<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>NSC | TIP Assessment</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    

    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Khula:700|Open+Sans" rel="stylesheet">
    
    <!-- Custom CSS Defenitions -->
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<div class="wrapper">
<div class="sidebar" data-color="azure">
            <div class="sidebar-wrapper">
            <div class="logo">
                <a href="faculty"><img src="assets/img/alt_logo.png" alt="NSC Logo" height="45" width="55"></a>
                <span>Welcome, <?php echo htmlspecialchars($name); ?></span>
            </div>

            <ul class="nav">
                <li>
                    <a href="faculty">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="active">
                    <a href="tip">
                        <i class="pe-7s-note2"></i>
                        <p>TIP Assessment</p>
                    </a>
                </li>
                <li>
                    <a href="facultyfaq">
                        <i class="pe-7s-news-paper"></i>
                        <p>FAQs</p>
                    </a>
                </li>
                <li>
                    <a href="facultysupport">
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
                    <a class="navbar-brand" href="#">TIP Assessment</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
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
                            <div class="card">
                                <div class="col-lg-12 text-center">
                                    <h1 class="display-3">TIP Assessment</h1>
                                    <p class="lead">Completing this assessment should take about 45 minutes. You may save your responses and
                                        exit at any time. Assessment will remain available for editing until final submission deadline of June, 29, 2017
                                        (this is a made up date....we should ask for a real one)</p>
                                    <hr class="my-4">
                                    <p>To begin a new assessment, or continue a saved assessment, please choose one of the options below.</p>

                                </div>
                                <div class="col-lg-12 text-center">
                                    <p class="lead" id="results">
                                        <a class="btn btn-primary btn-lg" href="#" id="begin" role="button">Begin New Assessment</a>
                                        <a class="btn btn-primary btn-lg" href="#" role="button">Continue Assessment</a>
                                    </p>
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

</html>
