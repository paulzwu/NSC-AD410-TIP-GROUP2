    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>TIP Editor</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    

    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

    <!-- Custom CSS Defenitions -->
    <link rel="stylesheet" href="assets/css/styles.css">

    <!-- Bootstrap -->
    <link href="http://getbootstrap.com/dist/css/bootstrap.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/styles.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.3.0/knockout-min.js"></script>
    <link href="https://surveyjs.azureedge.net/0.12.9/surveyeditor.css" type="text/css" rel="stylesheet" />
    <script src="https://surveyjs.azureedge.net/0.12.9/survey.ko.min.js"></script>
    <script src="https://surveyjs.azureedge.net/0.12.9/surveyeditor.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.0/ace.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.0/worker-json.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.0/mode-json.js" type="text/javascript"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" type="text/css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js" type="text/javascript"></script>
</head>
<body>
<!--NAVBAR-->
<?php include("navbar.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12" id="support">
            <h2>TIP Editor</h2>
            <hr>
        </div>
    </div>
</div>
<div id="surveyEditorContainer"></div>


<script>
    var editorOptions = {
        // show the embeded survey tab. It is hidden by default
        showEmbededSurveyTab: true,
        // show the test survey tab. It is shown by default
        showTestSurveyTab: true,
        // show the JSON text editor tab. It is shown by default
        showJSONEditorTab: true,
        // show the "Options" button menu. It is hidden by default
        showOptions: true
    };

    var survey = new SurveyEditor.SurveyEditor("surveyEditorContainer", editorOptions);
</script>

<!-- Footer-->
<footer class="container-fluid"
        style="min-height:200px; background-color:#18bc9c;color:#fff;text-align:center;padding-top:50px;">
    © 2017 ADBAS PROGRAM | NORTH SEATTLE COLLEGE
</footer>


<script type="text/javascript" src="assets/js/lib/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="assets/js/custom.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-2.2.4/dt-1.10.15/datatables.min.js"></script>

</body>
</html>
