<?PHP
error_reporting(E_ALL);
ini_set('display_errors', 1);
include  'config.php';
openOrCreateDB();

$pagetitle = 'Tip';
$username = 'Kari';
$usertype = 'admin';
// $waitingOn = 45;
// $totalFaculty = 200;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" href="data:;base64,iVBORw0KGgo=">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>TIP Editor</title>
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



     <!-- Survey JS Scripts       -->
    <script src="assets/js/lib/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.3.0/knockout-min.js"></script>
    <link href="https://surveyjs.azureedge.net/0.12.14/surveyeditor.css" type="text/css" rel="stylesheet" />
    <script src="https://surveyjs.azureedge.net/0.12.14/survey.ko.min.js"></script>
    <script src="https://surveyjs.azureedge.net/0.12.14/surveyeditor.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.6/ace.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.0/worker-json.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.0/mode-json.js" type="text/javascript"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <script src="assets/js/lib/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

    <script src="assets/js/light-bootstrap-dashboard.js"></script>
    <script src="assets/js/responsive_nav.js"></script>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar" data-color="azure">
            <div class="sidebar-wrapper">
            <div class="logo">
                <a href="index.php"><img src="assets/img/alt_logo.png" alt="NSC Logo" height="45" width="55"></a>
                <span>Welcome, <?php echo $username; ?></span>
            </div>


            <?php

            if ($usertype == 'admin'){
                include 'Views/templates/nav-admin.php';
                include 'Views/templates/toolbar-admin.php';
            }else{
                include 'Views/templates/nav-faculty.php';
                include 'Views/templates/toolbar-faculty.php';
            }
            ?>

<!-- Main Content -->
        <div class="content"><div class="container-fluid">
        <div id="surveyEditorContainer"></div>
<!-- loads the editor onto the page -->
        <script src="assets/js/tip_editor.js" type="text/javascript"></script>

<!-- Footer-->
<footer>
    © 2017 ADBAS PROGRAM | NORTH SEATTLE COLLEGE
</footer>
</div>
<<<<<<< HEAD
=======


<!--   Core JS Files   -->

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.3.0/knockout-min.js"></script>
<script src="https://surveyjs.azureedge.net/0.12.9/survey.ko.min.js"></script>
<script src="https://surveyjs.azureedge.net/0.12.9/surveyeditor.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.0/ace.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.0/worker-json.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.0/mode-json.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js" type="text/javascript"></script>

    <script src="assets/js/lib/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<script src="assets/js/light-bootstrap-dashboard.js"></script>
<script src="assets/js/responsive_nav.js"></script>

<!-- Response Rate Assets -->
<script>
       $(document).ready(function() {
                
        //------------ load survey ------------\\
        //request the JSON data and parse into the select element
        $('#loadSurvey').one('click', function() {
            loadNames('#surveyNames');
            // when load is clicked, pass the surveyID to the server and return survey json
            $(document).on('click', 'button#pass-data', function(){
                var docID = $(this).attr('data-id');
                if (docID == 0) {
                    console.log("no data");
                } else {
                    $("#loadBtn").click(function() {
                        $.ajax({url: 'survey_load.php',
                            data: {'ID':docID},
                            type: 'POST',
                            success:function(result) {
                                // custom complete message; displays a button for showing answers after the quiz is over
                                //var surveyComplete = "<h3 style=\"text-align:center;\">Thank you for completing the survey!</h3>";
                                Survey.defaultBootstrapCss.navigationButton = "btn btn-primary";
                                Survey.Survey.cssType = "bootstrap";
                                var survey = new Survey.Model(JSON.parse(result), "container");
                                //options for progress bar - top, bottom, none
                                survey.showProgressBar = "top"; survey.render();
                                // use this for custom messages after survey completed; if no text provided, uses default message
                                survey.completedHtml = ""; survey.render();
                                // when set to false, prevents the after survey message from displaying
                                survey.showCompletedPage = true; survey.render();
                                // displays a custom complete message
                                //survey.completedHtml = surveyComplete; survey.render();
                                // gathers survey answer data and does something with it
                                survey.onComplete.add(function (sender) {
                                    var mySurvey = sender;
                                    var surveyData = JSON.stringify(sender.data);
                                    $.ajax({url: 'save_answers.php',
                                        dataType: 'json',
                                        data: {'Responses':surveyData},
                                        type: 'POST',
                                        async: true})
                                    console.log("JSON data sent to server")
                                });

                                // survey.text loads quiz data into surveyjs editor
                                //survey.text=result;
                                console.log("survey loaded");
                            },
                            error:function() {
                                console.log("no survey to load");
                            }
                        });
                    });
                }
                console.log("survey ID: " + docID);
            });
        });
        // used to load a list of survey names into the load and overwrite modal boxes
        function loadNames(id){
            $select = $(id);
            // call to server to load quiz names
            $.ajax({
                url: 'survey_ids.php',
                dataType:'JSON',
                success:function(data){
                    //clear the current content of the select
                    $select.html('');
                    $.each(data.surveyInfo, function(key, val){
                        //report to user if db empty (no data in table)
                        if (val.surveyID == '0') {
                            $select.append('<button type=\"button\" id=\"pass-data\" class=\"list-group-item list-group-item-action\" data-id=\"0">No surveys saved.</button>');
                            console.log("no items to display");
                        } else {
                            //iterate over the data and create a list of buttons with data values to pass to load function
                            $select.append('<button type=\"button\" id=\"pass-data\" class=\"list-group-item list-group-item-action\" data-id=\"' + val.surveyID + '\">' + val.surveyName + '</button>');
                        }
                    })
                    console.log("survey menu created");
                },
                error:function(){
                    $select.html('');
                    //report to user if there is an error (db file missing)
                    $select.append('<button type=\"button\" id=\"pass-data\" class=\"list-group-item list-group-item-action\" data-id=\"-1\">Database not available.</button>');
                    console.log("database file not found");
                }
            });
        }
    });
</script>
<script>
    $(".svd_container .svd_menu a").each(function() {
        var text = $(this).text();
        text = text.replace("Survey Designer", "Tip Editor");
        text = text.replace("Test Survey", "Preview Tip");
        $(this).text(text);
    });
</script>

>>>>>>> 26ce9eca7b55d20000e46bb502f8c661f20cf316
</body>
</html>
