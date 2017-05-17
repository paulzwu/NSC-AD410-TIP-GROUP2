<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Faculty Dash</title>
    <link href="https://fonts.googleapis.com/css?family=Lobster|Open+Sans:400,400italic,300italic,300|Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/v/bs/jq-2.2.4/dt-1.10.15/datatables.min.css">
    <script type="text/javascript" src="<?php echo asset('js/jquery.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo asset('js/bootstrap.min.js');?>"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-2.2.4/dt-1.10.15/datatables.min.js"></script>
      <link rel="stylesheet" href="<?php echo asset('css/style.css');?>" />
      <link rel="stylesheet" href="<?php echo asset('css/font-awesome.min.css');?>" />

</head>
@include('layouts.partials.faculty_nav')
<body>

<div class="content">
        <div class="container">
            <div class="row">
                <div class="logo text-center">
                    <img src="img/logo.png" alt="logo">
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
    @include('layouts.partials.footer')
    <script type="text/javascript" src="<?php echo asset('js/custom.js');?>"></script>
</body>

</html>
