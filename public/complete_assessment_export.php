<?php
session_start();

if (isset($_POST['data']) && !empty($_POST['data'])) {
	$_SESSION['assessment_data'] = $_POST['data'];
	$data = $_SESSION['assessment_data'];
	saveAsCSV($data);
}

function saveAsCSV($dataArray) {
	$directory = 'report.csv';
	//$jsonData = json_encode($dataArray);
	$decodedData = json_decode($dataArray, true);
	$file = fopen($directory, 'w');
	foreach ($decodedData as $row) {
		fputcsv($file, $row);
	}
	fclose($file);
	echo $directory;
}

?>