<?php
ob_start();
session_start(); 
//for oauth, this line session_start must be at the top!
error_reporting(E_ALL);

if (isset($_POST['id']) && isset($_POST['data']) && !empty($_POST['id']) && !empty($_POST['data'])) {
    $_SESSION['response_data'] = $_POST['data'];
}


$data = json_decode($_SESSION['response_data'], true);
$totalSubmissions = $data[0]['totalSubmissions'];
$statsInProgress = $data[1]['statsInProgress'];
$statsComplete = $data[2]['statsComplete'];
$statsNotStarted = $data[3]['statsNotStarted'];
$vz = $data[4]['vz'];
$csvExportArray = array("Total_Submissions"=>$totalSubmissions, "In-Progress"=>$statsInProgress, "Complete"=> $statsComplete, "Not_Started"=> $statsNotStarted);
if($vz == false){
    header("Content-type: text/csv");
    header("Content-Disposition: attachment; filename=submission_rates.csv");
    header("Cache-Control: no-cache, no-store, must-revalidate");
    header("Pragma: no-cache");
    header("Expires: 0");
    $csvoutput = fopen('php://output', 'w');
    $headers = array_keys($csvExportArray);
    fputcsv($csvoutput, $headers);
    $row = array_values($csvExportArray);
    fputcsv($csvoutput, $row);
    fclose($csvoutput);
    exit;
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
            <button id="btnSave" class="button">Save Image</button>
        </div>
        <div id="img-out"></div>

<script type="text/javascript" src="../../assets/js/lib/jquery-3.2.1.min.js"></script>
<!-- <script type="text/javascript" src="../../assets/js/custom.js"></script> -->
<script src="../../assets/js/lib/raphael-2.1.4.min.js"></script>
<script type="text/javascript" src="../../assets/js/lib/d3.min.js"></script>
<script src="../../assets/js/lib/justgage.js"></script>
<!-- <script src="../../assets/js/tipprogress.js"></script> -->
<script src="../../assets/js/lib/html2canvas.js"></script>
<!-- Response Rate Assets -->
<script>
    var data = <?php echo $_SESSION['response_data']; ?>;
    console.log(data);
    var totalSubmissions = data[0]['totalSubmissions'];
    var statsInProgress = data[1]['statsInProgress'];
    var statsComplete = data[2]['statsComplete'];
    var statsNotStarted = data[3]['statsNotStarted'];
    var viz = data[4]['vz'];
    document.getElementById('totalSubmissions').innerHTML = "Total Submissions: " + totalSubmissions;
    $(document).ready(function() {

        if(viz === false) {
            document.getElementById("no").innerHTML = '';
        } else {
            var complete, inprogress, notstarted;
// document.addEventListener("DOMContentLoaded", function(event) {

    complete = new JustGage({
        id: "complete",
        value: statsComplete,
        titleFontFamily: "Open Sans",
        valueFontFamily: "Open Sans",
        titleFontColor: "#7f8c8d",
        valueFontColor: "#7f8c8d",
        min: 0,
        max: 50,
        gaugeWidthScale: 0.2,
        levelColors: ["#a2c171", "#92b558", "#8bb14e"],
        title: "Complete",
        relativeGaugeSize: true,
        donut: true,
    });

    inprogress = new JustGage({
        id: "inprogress",
        value: statsInProgress,
        titleFontFamily: "Open Sans",
        valueFontFamily: "Open Sans",
        titleFontColor: "#7f8c8d",
        valueFontColor: "#7f8c8d",
        min: 0,
        max: 50,
        gaugeWidthScale: 0.2,
        levelColors: ["#ffd480", "#ffcc66", "#ffc34d"],
        title: "In-Progress",
        relativeGaugeSize: true,
        donut: true,
    });

    notstarted = new JustGage({
        id: "notstarted",
        value: statsNotStarted,
        titleFontFamily: "Open Sans",
        valueFontFamily: "Open Sans",
        titleFontColor: "#7f8c8d",
        valueFontColor: "#7f8c8d",
        min: 0,
        max: 50,
        gaugeWidthScale: 0.2,
        levelColors: ["#ff944d", "#ff8533", "#ff751a"],
        title: "Not-Started",
        relativeGaugeSize: true,
        donut: true
    });
// });

           
            $(function() { 
    $("#btnSave").click(function() { 
        html2canvas($("#widget"), {
            onrendered: function(canvas) {
                theCanvas = canvas;
                document.body.appendChild(canvas);

                // Convert and download as image 
                Canvas2Image.saveAsPNG(canvas); 
                $("#img-out").append(canvas);
                // Clean up 
                document.body.innerHTML='';
            }
        });
    });
}); 
        }
                    
    });
</script>
</body>
</html>
