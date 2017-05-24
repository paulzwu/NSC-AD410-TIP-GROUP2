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
    <link href="http://getbootstrap.com/dist/css/bootstrap.css" type="text/css" rel="stylesheet" />

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

    <!-- Custom CSS Defenitions -->
    <link rel="stylesheet" href="assets/css/styles.css">

    <!--     Fonts and icons     -->
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Khula:700|Open+Sans" rel="stylesheet">

    <!-- Survey JS CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" type="text/css" rel="stylesheet" />
 
    <!-- Survey JS Scripts -->
    <script src="assets/js/lib/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.3.0/knockout-min.js"></script>
        <link href="https://surveyjs.azureedge.net/0.12.14/surveyeditor.css" type="text/css" rel="stylesheet" />
        <script src="https://surveyjs.azureedge.net/0.12.14/survey.ko.min.js"></script>
        <script src="https://surveyjs.azureedge.net/0.12.14/surveyeditor.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.0/ace.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.0/worker-json.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.0/mode-json.js" type="text/javascript"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" type="text/css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js" type="text/javascript"></script>

</head>
<body>
<div class="wrapper">
<div class="sidebar" data-color="azure">
            <div class="sidebar-wrapper">
            <div class="logo">
                <a href="/admin"><img src="assets/img/alt_logo.png" alt="NSC Logo" height="45" width="55"></a>
                <span>Welcome, <?php echo htmlspecialchars($name); ?></span>
            </div>

            <ul class="nav">
                <li>
                    <a href="admin">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="active">
                    <a href="edit">
                        <i class="pe-7s-note2"></i>
                        <p>TIP Editor</p>
                    </a>
                </li>
                <li>
                    <a href="adminfaq">
                        <i class="pe-7s-news-paper"></i>
                        <p>FAQs</p>
                    </a>
                </li>
                <li>
                    <a href="support">
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
                    <a class="navbar-brand" href="/edit">TIP Editor</a>
                </div>
                <div class="collapse navbar-collapse">
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
<div id="surveyEditorContainer">
            <script>
            //------------ editor options ------------\\
            // show the JSON text editor tab. It is shown by default
            var editorOptions = { showJSONEditorTab: false, };
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
                "<button type=\"button\" class=\"btn btn-primary\" id=\"newSurvey\">New</button>" +
                
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
                            $("#load").click(function() {
                                $.ajax({url: '../Models/TipEditor.php?action=loadSurveys',
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
                        }
                        console.log("survey ID: " + docID);
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
                            $.ajax({
                                url: '../Models/TipEditor.php?action=getSurveys',
                                data: {'saveData':jsonSurvey, 'saveName':nameOfSurvey}, 
                                type: 'POST',
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
</div>


    <!-- Footer-->
    <footer
            style="min-height:200px; background-color:#18bc9c;color:#fff;text-align:center;padding-top:50px;">
        © 2017 ADBAS PROGRAM | NORTH SEATTLE COLLEGE
    </footer>

</div>
</body>

    <!--   Core JS Files   -->
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!-- Light Bootstrap Table Core javascript-->
    <script src="assets/js/light-bootstrap-dashboard.js"></script>

    <script src="assets/js/responsive_nav.js"></script>
    <script src="assets/js/tip_editor.js"></script>

   
</html>
