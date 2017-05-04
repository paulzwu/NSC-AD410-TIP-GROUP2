<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TIP Editor</title>
    <link href="https://fonts.googleapis.com/css?family=Oxygen|Raleway" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" src="<?php echo asset('js/jquery.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo asset('js/bootstrap.min.js');?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.3.0/knockout-min.js"></script>
    <link rel="stylesheet" href="<?php echo asset('css/app.css');?>" />
    <link rel="stylesheet" href="<?php echo asset('css/master_styles.css');?>" />
    <script src="https://surveyjs.azureedge.net/0.12.9/survey.ko.min.js"></script>
    <script src="https://surveyjs.azureedge.net/0.12.9/surveyeditor.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.0/ace.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.0/worker-json.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.0/mode-json.js" type="text/javascript"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" type="text/css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js" type="text/javascript"></script>

</head>
    @include('layouts.partials.admin_nav')   
        <body>
            <div id="wrap">
                <div id="main" class="container clear-top">
                    <!-- Main Content -->
                </div>
            </div>
            @include('layouts.partials.footer')
        </body>
    </div>
</html>
