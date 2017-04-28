<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TIP APP</title>
    <link href="https://fonts.googleapis.com/css?family=Oxygen|Raleway" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" src="<?php echo asset('js/jquery.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo asset('js/bootstrap.min.js');?>"></script>
      <link rel="stylesheet" href="<?php echo asset('css/app.css');?>" />
      <link rel="stylesheet" href="<?php echo asset('css/master_styles.css');?>" />

</head>
    <nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="<?php echo url('/');?>">
                <img src="<?php echo asset('img/alt_logo.png');?>" height="50" width="55" alt="NSC Logo">
            </a>
        </div>

            <div class="container">
            <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo url('/admin');?>">HOME</a></li>
            <li><a href="<?php echo url('/tipeditor');?>">TIP EDITOR</a></li>
            <li><a href="<?php echo url('/faqs');?>">FAQs</a></li>
            </ul>
    </div>
</nav>

        <body>
            <div id="wrap">
                <div id="main" class="container clear-top">
                    <!-- Main Content -->
                    <div class="container">
                        <div class="text-center">
                            <a href="<?php echo url('/admin');?>"><button type="button" class="btn btn-primary">Administrator</button></a>
                            <a href="<?php echo url('/faculty');?>"><button type="button" class="btn btn-primary">Faculty</button></a>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.partials.footer')
        </body>
    </div>
</html>
