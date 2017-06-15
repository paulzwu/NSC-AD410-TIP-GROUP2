<?php
ob_start();
session_start(); 
//for oauth, this line session_start must be at the top!
error_reporting(E_ALL);
// include  '../../config.php';
// require '../../../vendor/autoload.php';
// use \Dompdf\Dompdf;

// define('UPLOAD_DIRECTORY', '../../GeneratedReports/');

if (isset($_POST['id']) && isset($_POST['data']) && !empty($_POST['id']) && !empty($_POST['data'])) {
    $_SESSION['bubble_data'] = $_POST['data'];
}

$data = json_decode($_SESSION['bubble_data'], true);
// print_r($data);
$dataArray = array();
$csvOutputArray = array();
// // $csvExportArray = array();
// array_push(array, var)
// array_push($dataArray, 'null');
for($i = 0; $i < sizeof($data); $i++) {
    $learning_outcome = $data[$i];
    array_push($dataArray, $learning_outcome);
    // echo $learning_outcome;

}
// print_r($dataArray) ;
// print_r($learning_outcome['departments']);
// print_r($dataArray[0]);
foreach ($dataArray as $lc) {
  // print_r($lc['departments']);
  $lcc = $lc['learningOutcome'];
  $csvOutputArray[$lcc] = $lc['departments'];
}
// // print_r($csvOutputArray);
    header("Content-type: text/csv");
    header("Content-Disposition: attachment; filename=submission_rates.csv");
    header("Cache-Control: no-cache, no-store, must-revalidate");
    header("Pragma: no-cache");
    header("Expires: 0");
    $csvoutput = fopen('php://output', 'w');
    $headers = array_keys($csvOutputArray);
    fputcsv($csvoutput, $headers);
    // $row = array_values($dataArray);
    // fputcsv($csvoutput, $row);
    fclose($csvoutput);
    exit;

// foreach ($dataArray as $key) {
//   print_r($key['departments']);
// }


// print_r($learning_outcome['departments']);
    // foreach ($learning_outcome['departments'] as $dept) {
    //   $dc = $dept['count'];
      // $dataArray[$learning_outcome] = $d;
    // }
    // print_r($dataArray);
    // $lo = $learning_outcome['learningOutcome'];
    // $val = $data[$i]['value'];
    // $dataArray[$dept] = $val;

?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Response By Division</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <script src="../../assets/js/lib/jquery-3.2.1.min.js" type="text/javascript"></script> -->


    <!-- BASE STYLES FOR SITE | DO NOT ERASE -->

   <!-- <style type="text/css">
text {
  font-size: 9px;
  pointer-events: none;
  font-style: oblique;
    fill: #999;
}

text.parent {
  font-size: 18px;
  fill: #000000;
  font-style: inherit;
  font-weight: bold;
}

circle {
  fill: #ccc;
  stroke: #999;
  pointer-events: all;
    opacity: .5;
}

circle.parent {
  fill: #1f77b4;
  fill-opacity: .1;
  stroke: steelblue;
    opacity: .7;
}

circle.parent:hover {
  stroke: #ff7f0e;
  stroke-width: .7;
}

circle.child {
  pointer-events: none;
}
body > svg {
    margin: 80px 160px 100px 460px;
    position: absolute;
    top: -80px;
    left: -160px;
    float: right;
}
h2{
    position: absolute;
    text-align: right;
    margin-left: 50px;
    margin-bottom: 100px;
    float:left;

}
p{
    position: absolute;
    margin-top: 8pc;
    text-align: left;
    margin-left: 50px;
    margin-bottom: 100px;
    float:left;
}

    </style>
  </head>

  <body>
  <h2>      Response by Learning Outcome  </h2>
  <p>
    1:  Facts, theories, perspectives, and methodologies<br> within and across disciplines<br><br>
    2:  Critical thinking and problem solving<br><br>
    3:  Communication and self-expression<br><br>
      4:  Quantitative reasoning<br><br>
      5:  Information literacy<br><br>
      6:  Civic engagement: local, global, and environmental<br><br>
      7:  Collaboration: group and team work<br><br>
      8:  Technological proficiency<br><br>
      9:  Intercultural knowledge and competence<br><br>
      10:  Ethical awareness and personal integrity<br><br>
      11:  Lifelong learning and personal well-being<br><br>
      12:  Synthesis and application of knowledge, skills,<br> and responsibilities to new settings and problems<br><br>
  </p>
 -->


  <!--   <script type="text/javascript" src="../../assets/js/lib/d3/d3.js"></script>
    <script type="text/javascript" src="../../assets/js/lib/d3/d3.layout.js"></script> -->
    <!-- <script type="text/javascript" src="bubblezoom.js"></script> -->
    <!-- <script>

var w = 1000,
    h = 800,
    r = 720,
    x = d3.scale.linear().range([0, r]),
    y = d3.scale.linear().range([0, r]),
    node,
    root;

var pack = d3.layout.pack()
    .size([r, r])
    .value(function(d) { return d.size; });

var vis = d3.select("body").append("svg:svg")
    .attr("width", w)
    .attr("height", h)
    .append("svg:g")
    .attr("transform", "translate(" + (w - r) / 2 + "," + (h - r) / 2 + ")");

d3.json("flare.json", function(data) {
    node = root = data;

    var nodes = pack.nodes(root);

    vis.selectAll("circle")
        .data(nodes)
        .enter().append("svg:circle")
        .attr("class", function(d) { return d.children ? "parent" : "child"; })
        .attr("cx", function(d) { return d.x; })
        .attr("cy", function(d) { return d.y; })
        .attr("r", function(d) { return d.r; })
        .on("click", function(d) { return zoom(node == d ? root : d); });

    vis.selectAll("text")
        .data(nodes)
        .enter().append("svg:text")
        .attr("class", function(d) { return d.children ? "parent" : "child"; })
        .attr("x", function(d) { return d.x; })
        .attr("y", function(d) { return d.y; })
        .attr("dy", ".35em")
        .attr("text-anchor", "middle")
        .style("opacity", function(d) { return d.r > 20 ? 1 : 0; })
        .text(function(d) { return d.name; });

    d3.select(window).on("click", function() { zoom(root); });
});

function zoom(d, i) {
    var k = r / d.r / 2;
    x.domain([d.x - d.r, d.x + d.r]);
    y.domain([d.y - d.r, d.y + d.r]);

    var t = vis.transition()
        .duration(d3.event.altKey ? 7500 : 750);

    t.selectAll("circle")
        .attr("cx", function(d) { return x(d.x); })
        .attr("cy", function(d) { return y(d.y); })
        .attr("r", function(d) { return k * d.r; });

    t.selectAll("text")
        .attr("x", function(d) { return x(d.x); })
        .attr("y", function(d) { return y(d.y); })
        .style("opacity", function(d) { return k * d.r > 20 ? 1 : 0; });

    node = d;
    d3.event.stopPropagation();
}
    function sendDataToCSV() {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'exportSubmissionByDepartmentCSV.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.onreadystatechange = function(){
            if(xhr.readyState == 4 && xhr.status == 200){
                window.open('exportSubmissionByDepartmentCSV.php');
            }
        };
        xhr.send("id=chart_data&data=" + data);
    } 

</script>
 -->

<!-- </body>
</html> -->
