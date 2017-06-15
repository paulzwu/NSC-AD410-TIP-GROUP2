<?php
ob_start();
session_start(); 
//for oauth, this line session_start must be at the top!
error_reporting(E_ALL);


$data = json_decode($_SESSION['chart_data'], true);
// print_r($data);
$dataArray = array();
// $csvExportArray = array();
for($i = 0; $i < sizeof($data); $i++) {
    $dept = $data[$i]['label'];
    $val = $data[$i]['value'];
    $dataArray[$dept] = $val;
}
    header("Content-type: text/csv");
    header("Content-Disposition: attachment; filename=submission_rates.csv");
    header("Cache-Control: no-cache, no-store, must-revalidate");
    header("Pragma: no-cache");
    header("Expires: 0");
    $csvoutput = fopen('php://output', 'w');
    $headers = array_keys($dataArray);
    fputcsv($csvoutput, $headers);
    $row = array_values($dataArray);
    fputcsv($csvoutput, $row);
    fclose($csvoutput);
    exit;
