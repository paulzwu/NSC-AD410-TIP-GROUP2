<?php
ob_start();
session_start(); 
//for oauth, this line session_start must be at the top!
error_reporting(E_ALL);

if (isset($_POST['id']) && isset($_POST['data']) && !empty($_POST['id']) && !empty($_POST['data'])) {
    $_SESSION['response_data'] = $_POST['data'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="data:;base64,iVBORw0KGgo=">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TIP Submission Stats</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Taviraj|Work+Sans" rel="stylesheet">
    <script src="../../assets/js/lib/canvas2image.js"></script>
</head>
<body>
<!-- Main Content -->
<div class="content responses-content" id="widget">
    <div class="container-fluid" id="no">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                <div class="card">
                    <div class="header">
                        <h2 class="title">TIP Submission Rates</h2>
                        <h4 id="totalSubmissions"></h4>
                        <p></p>
                        <hr>
                    </div>
                    <div class="content">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-sm-4 col-xs-4">
                                <div id="complete" class="gauge"></div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-sm-4 col-xs-4">
                                <div id="inprogress" class="gauge"></div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-sm-4 col-xs-4">
                                <div id="notstarted" class="gauge"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <button id="btnSave" class="button" onclick="sendDataToCSV()">Download Data as CSV</button>
        </div>
        <!-- <div id="img-out"></div> -->

<script type="text/javascript" src="../../assets/js/lib/jquery-3.2.1.min.js"></script>
<!-- <script type="text/javascript" src="../../assets/js/custom.js"></script> -->
<script src="../../assets/js/lib/raphael-2.1.4.min.js"></script>
<script type="text/javascript" src="../../assets/js/lib/d3.min.js"></script>
<script src="../../assets/js/lib/justgage.js"></script>
<script src="../../assets/js/tipprogress.js"></script>
<!-- <script src="../../assets/js/lib/html2canvas.js"></script> -->
<!-- Response Rate Assets -->
<script>
    var data = <?php echo $_SESSION['response_data']; ?>;
    console.log(data);
    var totalSubmissions = data[0]['totalSubmissions'];
    var statsInProgress = data[1]['statsInProgress'];
    var statsComplete = data[2]['statsComplete'];
    var statsNotStarted = data[3]['statsNotStarted'];
    var viz = data[4]['vz'];
    // document.getElementById('totalSubmissions').innerHTML = "Total Submissions: " + totalSubmissions;
    // $(document).ready(function() {
        function sendDataToCSV() {
            var xhr = new XMLHttpRequest();
            // xhr.open('POST', 'Views/Reports/tip_completion_by_division.php', true);
            xhr.open('POST', 'exportSubmissionCSV.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
            xhr.onreadystatechange = function(){
                if(xhr.readyState == 4 && xhr.status == 200){
                    window.open('exportSubmissionCSV.php');
                }
            };
            xhr.send("id=response_data&data=" + data);
        }           
    // });
</script>
</body>
</html>
