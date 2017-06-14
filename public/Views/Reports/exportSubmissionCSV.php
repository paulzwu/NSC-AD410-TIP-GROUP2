<?php
ob_start();
session_start(); 
//for oauth, this line session_start must be at the top!
error_reporting(E_ALL);

// if (isset($_POST['csv_data']) && isset($_POST['data']) && !empty($_POST['csv_data']) && !empty($_POST['data'])) {
//     $_SESSION['csv_data'] = $_POST['data'];
// }


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
