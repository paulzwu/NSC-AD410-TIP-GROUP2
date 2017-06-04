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
         <div class="content">
            <div class="container-fluid">
        <div id="surveyEditorContainer"></div>
        <script>
            //------------ editor options ------------\\
            // show the JSON text editor tab. It is shown by default
            //var editorOptions = { showJSONEditorTab: false, };
                var editorOptions = {
               // show the embeded survey tab. It is hidden by default
               showEmbededSurveyTab: false,
               // show the test survey tab. It is shown by default
               showTestSurveyTab: true,
               // show the JSON text editor tab. It is shown by default
               showJSONEditorTab: false,
               // show the "Options" button menu. It is hidden by default
               showOptions: false
            };
            // pass the editorOptions into the constructor. It is an optional parameter.
            var survey = new SurveyEditor.SurveyEditor("surveyEditorContainer", editorOptions);

        //--- this block uses jquery to append the save, load and new buttons to the div used ---\\
        //--- by survey js. this makes integration of these features look seamless ---\\
            $navBarHack = $(".navbar-default.container-fluid.nav.nav-tabs.svd_menu");
            // these lines create the buttons and place them in the same 'div' as the rest of
            // the buttons and tabs in the original editor
            $navBarHack.append(
                "<button type=\"button\" class=\"btn btn-primary\" id=\"loadSurvey\" data-toggle=\"modal\" data-target=\"#loadBox\" data-backdrop=\"static\">Load</button>" +
                "<button type=\"button\" class=\"btn btn-primary\" id=\"saveSurvey\" data-toggle=\"modal\" data-target=\"#saveBox\" data-backdrop=\"static\">Save</button>" +
                "<button type=\"button\" class=\"btn btn-primary\" id=\"newSurvey\">Clear Form</button>" +

                "<div class=\"modal fade\" id=\"loadBox\" role=\"dialog\">" +
                    "<div class=\"modal-dialog\">" +
                        "<div class=\"modal-content\">" +
                            "<div class=\"modal-header\">" +
                                "<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>" +
                                "<h4 class=\"modal-title\">Load</h4>" +
                            "</div>" +
                            "<div class=\"modal-body\">" +
                                "<div class=\"list-group\" id=\"surveyNames\"></div>" +
                            "</div>" +
                            "<div class=\"modal-footer\">" +
                                "<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\" id=\"load\">Load</button>" +
                                "<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\" id=\"cancelLoad\">Cancel</button>" +
                                "<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\" id=\"delete\">Delete</button>" +
                            "</div>" +
                        "</div>" +
                    "</div>" +
                "</div>" +
                "<div class=\"modal fade\" id=\"saveBox\" role=\"dialog\">" +
                    "<div class=\"modal-dialog\">" +
                        "<div class=\"modal-content\">" +
                            "<div class=\"modal-header\">" +
                                "<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>" +
                                "<h4 class=\"modal-title\">Save</h4>" +
                            "</div>" +
                            "<div class=\"modal-body\">" +

                                        "<br><form id=\"test\">New survey name: <input type=\"text\" name=\"surveyName1\"></form>" +

                            "</div>" +
                            "<div class=\"modal-footer\">" +
                                "<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\" id=\"save\">Save</button>" +
                                "<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\" id=\"cancelSave\">Cancel</button>" +
                            "</div>" +
                        "</div>" +
                    "</div>" +
                "</div>"
            );

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
                          console.log("survey ID: " + docID);
                          $("#load").click(function() {
                              $.ajax({url: 'survey_load.php',
                                      data: {'ID':docID},
                                      type: 'POST',
                                      success:function(result) {
                                      // survey.text loads quiz data into surveyjs editor
                                          survey.text=result;
                                          console.log("survey loaded");
                                      },
                                      error:function() {
                                          console.log("no survey to load");
                                      }
                              });
                          });
                          $("#delete").click(function() {
                            $.ajax({url: 'survey_delete.php',
                                    data: {'ID':docID},
                                    type: 'POST',
                                    success:function(result) {
                                      console.log("survey " + docID + " deleted");
                                    }
                            });
                          });
                        }
                    });
                });

                //------------ save survey ------------\\
                // TODO: include the ability to save over an existing survey
                $('#saveSurvey').one('click', function() {
                    // adds input field for entering quiz name
                    //loadNames('#overwrite1');
                    // try to get save as and overwrite to submit survey name values only when that tab is active
                    // $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
                        // var currentTab = $(e.target).text(); // get current tab
                        // var LastTab = $(e.relatedTarget).text(); // get last tab
                        // if('div#saveas.tab-pane.fade.active.in'){
                            // alert('SAVEAS');
                        // } else if('div#overwrite.tab-pane.fade.active.in') {
                            // alert('OVERWRITE');
                        //}
                    // when save button pressed,
                    $("#save").click(function() {
                        // right now, names do not have to be unique - TODO: enforce unique quiz names
                        var nameOfSurvey = $('input[name=surveyName1]').val();
                        var jsonSurvey = survey.text;
                        //var jsonSurvey1 = JSON.stringify(jsonSurvey.replace(/\r?\n|\r/g, ""));
                        //var jsonSurvey2 = jsonSurvey1.replace(/ /g, '');
                        // if no name given, data not saved
                        if (nameOfSurvey == null || !nameOfSurvey.replace(/\s/g, '').length) {
                            alert("No name given. Survey not saved.");
                            console.log("Save canceled")
                        } else {
                            // survey json and name saved to db
                            $.ajax({url: 'survey_save.php', data: {'saveData':jsonSurvey, 'saveName':nameOfSurvey}, type: 'POST',
                                        success: console.log("json data sent to server") });

                            alert("This survey has been saved.");
                            $('#test').children('input').val('')
                        }
                    });
                    $("#cancelSave").click(function(){
                        $('#test').children('input').val('')
                    });
                });
                //------------ delete survey ------------\\
                // TODO: implement this function
                //$("#deleteSurvey").click(function() {
                    // removes survey from DB
                    //console.log("survey deleted");
                //});
                //------------ new survey ------------\\
                $("#newSurvey").click(function() {
                    // removes all json data, effectively resetting the survey editor
                    survey.text = '';
                    console.log("json data cleared");
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
</div>
</div>


<!-- Footer-->
<footer>
    © 2017 ADBAS PROGRAM | NORTH SEATTLE COLLEGE
</footer>
</div>


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
        //------------ load survey ------------\\
        $(document).ready(function() {
        $('#loadSurvey').one('click', function() {
            loadNames('#surveyNames');
            // when load is clicked, pass the surveyID to the server and return survey json
            $(document).on('click', 'button#pass-data', function(){
                var docID = $(this).attr('data-id');
                if (docID == 0) {
                    console.log("no data");
                } else {
                    $("#loadBtn").click(function() {
                        $.ajax({url: '"<?php echo base_url(); ?>" + "index.php/ajax_post_controller/user_data_submit"',
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
</script>

</body>
</html>


