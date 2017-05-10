<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TIP Assessment</title>

    <!-- Bootstrap -->
    <link href="http://getbootstrap.com/dist/css/bootstrap.css" type="text/css" rel="stylesheet"/>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.3.0/knockout-min.js"></script>
    <link href="https://surveyjs.azureedge.net/0.12.9/surveyeditor.css" type="text/css" rel="stylesheet"/>
    <script src="https://surveyjs.azureedge.net/0.12.9/survey.ko.min.js"></script>
    <script src="https://surveyjs.azureedge.net/0.12.9/surveyeditor.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.0/ace.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.0/worker-json.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.0/mode-json.js" type="text/javascript"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" type="text/css"
          rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"
            type="text/javascript"></script>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Taviraj|Work+Sans" rel="stylesheet">
</head>
<body>
<!--NAVBAR-->
<?php include("navbar.php"); ?>
<div class="container" id="support">
    <div class="row" id="container">
        <div class="jumbotron">
            <h1 class="display-3">TIP Assessment</h1>
            <p class="lead">Completing this assessment should take about 45 minutes. You may save your responses and
                exit at any time. Assessment will remain available for editing until final submission deadline of June, 29, 2017
                (this is a made up date....we should ask for a real one)</p>
            <hr class="my-4">
            <p>To begin a new assessment, or continue a saved assessment, please choose one of the options below.</p>
            <p class="lead" id="results">
                <a class="btn btn-primary btn-lg" href="#" id="begin" role="button">Begin New Assessment</a>
                <a class="btn btn-primary btn-lg" href="#" role="button">Complete Assessment</a>
            </p>
        </div>
    </div>


</div>
<!-- Footer-->
<footer class="container-fluid"
        style="min-height:200px; background-color:#18bc9c;color:#fff;text-align:center;padding-top:50px;">
    © 2017 ADBAS PROGRAM | NORTH SEATTLE COLLEGE
</footer>
<script type="text/javascript" src="assets/js/lib/jquery-3.2.1.min.js"></script>
<script src="assets/js/lib/raphael-2.1.4.min.js"></script>
<script src="assets/js/lib/justgage.js"></script>
<script src="assets/js/quiz.js"></script>

</body>
</html>
