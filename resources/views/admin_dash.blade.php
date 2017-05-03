<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dash</title>
    {!! Charts::assets() !!}
    <link href="https://fonts.googleapis.com/css?family=Oxygen|Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,300,600,800,900" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" src="<?php echo asset('js/jquery.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo asset('js/bootstrap.min.js');?>"></script>
      <link rel="stylesheet" href="<?php echo asset('css/app.css');?>" />
      <link rel="stylesheet" href="<?php echo asset('css/master_styles.css');?>" />

</head>
    @include('layouts.partials.admin_nav')   
        <body>
            <div id="wrap">
                <div id="main" class="container clear-top">
                    <!-- Main Content -->
                    @include('layouts.partials.progress_indicator_charts') 
                </div>
            </div>
            @include('layouts.partials.footer')
        </body>
    </div>
</html>
