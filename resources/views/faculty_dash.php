<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Faculty Dash</title>
    <link href="https://fonts.googleapis.com/css?family=Lobster|Open+Sans:400,400italic,300italic,300|Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/v/bs/jq-2.2.4/dt-1.10.15/datatables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-2.2.4/dt-1.10.15/datatables.min.js"></script>
    <!-- <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css"> I can't find this file in the css directory-->    
    <!-- <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css"> Also wondering if we need the wow.js and animate.css-->
      <link rel="stylesheet" href="<?php echo asset('css/style.css');?>" />
      <link rel="stylesheet" href="<?php echo asset('css/font-awesome.min.css');?>" />

</head>

<body>
    <nav class="navbar navbar-inverse navbar-static-top example6">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar6">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand text-hide" href="http://disputebills.com">Brand Text
        </a>
            </div>
            <div id="navbar6" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="#">Home</a>
                    </li>
                    <li><a href="#">About</a>
                    </li>
                    <li><a href="#">Contact</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Action</a>
                            </li>
                            <li><a href="#">Another action</a>
                            </li>
                            <li><a href="#">Something else here</a>
                            </li>
                            <li class="divider"></li>
                            <li class="dropdown-header">Nav header</li>
                            <li><a href="#">Separated link</a>
                            </li>
                            <li><a href="#">One more separated link</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
        <!--/.container-fluid -->
    </nav>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="logo text-center">
                    <img src="<?php echo asset('img/logo.png');?>" alt="North Seattle College">
                    <h2>Hello USER</h2>
                    <center>
                        <button type="button" class="btn btn-primary">Start new assessment</button>
                    </center>
                </div>
                <div class="subcription-info text-center"> </div>
            </div>

        </div>
        <section>
            <div class="container">
                <div class="row">
                    <div class="about-title">
                        <center>
                            <h2>My TIPS</h2>
                        </center>
                    </div>
                    <table id="facultyTIP" class="display" width="100%"></table>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="row">
                    <div class="about-title">
                        <center>
                            <h2>Search Shared TIPS</h2>
                        </center>
                    </div>
                    <table id="sharedTIP" class="display" width="100%"></table>
                </div>
            </div>
        </section>
    </div>
    <footer class="footer">
        <div class="container">
            <div class="row bort">

                <div class="copyright">
                    © Copyright </div>

            </div>
        </div>
    </footer>
    <script type="text/javascript" src="<?php echo asset('js/jquery.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo asset('js/bootstrap.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo asset('js/faculty_dash.js');?>"></script>
</body>

</html>
