<?php
ob_start();
session_start(); 
//for oauth, this line session_start must be at the top!
error_reporting(E_ALL);
include  '../../config.php';
require '../../../vendor/autoload.php';
use \Dompdf\Dompdf;

define('UPLOAD_DIRECTORY', '../../GeneratedReports/');

if (isset($_POST['id']) && isset($_POST['data']) && !empty($_POST['id']) && !empty($_POST['data'])) {
    $_SESSION['chart_data'] = $_POST['data'];
}

$data = json_decode($_SESSION['chart_data'], true);
// print_r($data);
$csvExportArray = array();
for($i = 0; $i < sizeof($data); $i++) {
    $dept = $data[$i]['label'];
    $val = $data[$i]['value'];
    array_push($csvExportArray, [$dept, $val]);
}
print_r($csvExportArray);
// $totalSubmissions = $data[0]['label'];
// echo $totalSubmissions;
// print_r($totalSubmissions);
// $statsInProgress = $data[1]['statsInProgress'];
// $statsComplete = $data[2]['statsComplete'];
// $statsNotStarted = $data[3]['statsNotStarted'];
// $vz = $data[4]['vz'];
// $csvExportArray = array("Total_Submissions"=>$totalSubmissions, "In-Progress"=>$statsInProgress, "Complete"=> $statsComplete, "Not_Started"=> $statsNotStarted);
// if($vz == false){
    // header("Content-type: text/csv");
    // header("Content-Disposition: attachment; filename=submission_rates.csv");
    // header("Cache-Control: no-cache, no-store, must-revalidate");
    // header("Pragma: no-cache");
    // header("Expires: 0");
    // $csvoutput = fopen('php://output', 'w');
    // $headers = array_keys($csvExportArray);
    // fputcsv($csvoutput, $headers);
    // $row = array_values($csvExportArray);
    // fputcsv($csvoutput, $row);
    // fclose($csvoutput);
    // exit;
// } 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Response By Division</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <script src="../../assets/js/lib/jquery-3.2.1.min.js" type="text/javascript"></script>


    <!-- BASE STYLES FOR SITE | DO NOT ERASE -->

    <style>
        body {
            font-family: Verdana;
            font-size: 11px;
            padding: 10px;
        }

        #chartdiv {
            width: 600px;
            height: 500px;
            font-size: 11px;
            border: 2px solid #eee;
            float: left;
            margin-bottom: 10pc;
            margin-left: 18pc;
        }
        #legend {
            width: 250px;
            height: 400px;
            border: 2px solid #eee;
            margin-left: 10px;
            float: left;
            padding-top: 50px;
            padding-bottom: 50px;
            margin-bottom: 10pc;
        }
        #legend .legend-item {
            margin: 10px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }
        #legend .legend-item .legend-value {
            font-size: 12px;
            font-weight: normal;
            margin-left: 22px;
            margin-bottom: 25px;
        }
        #legend .legend-item .legend-marker {
            display: inline-block;
            width: 12px;
            height: 12px;
            border: 2px solid #ccc;
            margin-right: 10px;
        }
        #legend .legend-item.disabled .legend-marker {
            opacity: 0.2;
            background: #ddd;
        }
        h2{
            text-align: center;
            font-size: 30px;
        }
        .container-fluid{
            margin: 0 auto;
        }

    </style>

</head>
<body id="img">

<div class="container-fluid">
        <h2 style="margin-bottom:100px; margin-top:60px;">Response by Department</h2>

        <div id="chartdiv" align="center"></div>
        <div id="legend" align="center"></div>

</div>

<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/pie.js"></script>

<script>
var data = <?php echo $_SESSION['chart_data']; ?>;
var chart = AmCharts.makeChart("chartdiv", {
    "type": "pie",
    "theme": "light",
    "dataProvider": data,
    "valueField": "value",
    "titleField": "label",
    "labelRadius": 10,
    "radius": 200,
    "labelText": "[[title]]",
    "marginTop": 0,
    "marginBottom": 0,
    "groupPercent": 5

});
chart.addListener('rendered', function(event) {
    // populate our custom legend when chart renders
    chart.customLegend = document.getElementById('legend');
    for (var i in chart.chartData) {
        var row = chart.chartData[i];
        var color = chart.colors[i];
        var percent = Math.round(row.percents * 100) / 100;
        var value = row.value;
        legend.innerHTML += '<div class="legend-item" id="legend-item-' + i + '" onclick="toggleSlice(' + i + ');" onmouseover="hoverSlice(' + i + ');" onmouseout="blurSlice(' + i + ');" ><div class="legend-marker" style="background: ' + color + '"></div>' + row.title + '<div class="legend-value">' + value + ' | ' + percent + '%</div></div>';
    }
});

function toggleSlice(item) {
    chart.clickSlice(item);
}

function hoverSlice(item) {
    chart.rollOverSlice(item);
}

function blurSlice(item) {
    chart.rollOutSlice(item);
}

var html = document.getElementById('img');
createCookie("html", html, "10");

 function createCookie(name, value, days) {
 var expires;
 if (days) {
  var date = new Date();
  date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
  expires = "; expires=" + date.toGMTString();
 } else {
  expires = "";
 }
  document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
 }

</script>


</body>
</html>
