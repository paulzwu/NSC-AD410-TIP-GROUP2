<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include  'config.php';
// openOrCreateDB();
include "db_connect.php";

require '../vendor/autoload.php';

use \Core\View;
use \SimpleExcel\SimpleExcel;
use \Dompdf\Dompdf;

define('UPLOAD_DIRECTORY', 'GeneratedReports/');

function is_ajax_request(){
	return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
	$_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
}

if(!is_ajax_request()){
	exit;
}

$array = array();
$exportType = '';

$rawID = isset($_POST['id']) ? $_POST['id'] : '';

switch ($rawID) {
	case 'submissionStatsModal':
		$dummyJSON = '{
					"modalHeader": "TIP Submission Stats",
					"modalDescription": "This report provides the TIP completion status for NSC staff, and provides their contact information as well department so that they may be easily contacted.",
					"academicYears": "[<option>2016-2017</option>]",
					"requestedReport": "submissionStats"
				}';
		echo $dummyJSON;
		break;

	case 'divisionCompletionModal':
		$dummyJSON = '{
					"modalHeader": "TIP Participation Rate By Department",
					"modalDescription": "This report represents the rates of participation for each division. The percentage of participation is measured in relation to the total number of submissions received for the time period specified.",
					"academicYears": ["<option>2016-2017</option>"],
					"requestedReport": "divisionCompletion"
				}';
		echo $dummyJSON;
		break;
	case 'trendingTopicsModal':
		$dummyJSON = '{
					"modalHeader": "Trending Topics",
					"modalDescription": "This report idenifies emerging trends in TIP reponse content by tracking the frequency with which certain words are used.",
					"academicYears": ["<option>2016-2017</option>"],
					"requestedReport": "trendingTopics"
				}';
		echo $dummyJSON;
		break;

	case 'learningOutcomesModal':
		$dummyJSON = '{
					"modalHeader": "Learning Outcomes by Division",
					"modalDescription": "This report represents the frequency with which learning outcomes are adressed by each division.",
					"academicYears": ["<option>2016-2017</option>"],
					"requestedReport": "learningOutcomes"
				}';
		echo $dummyJSON;
		break;

	case 'exportReport':
		$startDate = $_POST['startDate'];
		$endDate = $_POST['endDate'];
		// $export= $_POST['exportType'];
		
		if($_POST['reportType'] == 'TIPSubmissionStats') {
			$dataArray = array("requestedReport" => 'TIPSubmissionStats', "submissionTotal" => getTotalSubmissions($connection), "inProgress" => getSubmissionsInProgress($connection), "complete" => getSubmissionsComplete($connection), "notStarted" => getSubmissionsNotStarted($connection));
				print_r(json_encode($dataArray));
		} else if ($_POST['reportType'] == 'TIPParticipationRateByDepartment') {
			$dataArray = array("requestedReport" => 'TIPParticipationRateByDepartment', "departments" => getDepartments($connection), "submissionTotal" => getTotalSubmissions($connection), "submissionsByDept" => getSubmissionsByDepartment($connection));
			print_r(json_encode($dataArray));
		} else if ($_POST['reportType'] == 'TrendingTopics') {

		} else if($_POST['reportType'] == 'LearningOutcomesbyDivision') {
			// $dataArray = array("requestedReport" => 'LearningOutcomesbyDivision', "submissionTotal" => getTotalSubmissions($connection), "inProgress" => getSubmissionsInProgress($connection), "complete" => getSubmissionsComplete($connection), "notStarted" => getSubmissionsNotStarted($connection));
			$dataArray = getDivisionLearningOutomes($connection);
			$newDataArray = array("requestedReport" => 'LearningOutcomesbyDivision', "data"=>$dataArray, "departments" => getDepartments($connection));
				print_r(json_encode($newDataArray));
		} else {
			echo "Unable to process request";
		}
		
		break;

	default:
		echo "Unable to process request";
		break;
}

function getDepartmentData($connection, $startDate, $endDate) {
	$jsonArray = array();
      $sqlstmt = "SELECT * FROM ANSWER";
    try {
        $statement = $connection->prepare($sqlstmt);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $jsonData = $statement->fetchAll();
        $jsonArray = array('data' => $jsonData);
    }  catch (PDOException $e) {
      // returns internal server error if no table found
        header('HTTP/1.1 500 Internal Server Error');
        header('Content-Type: application/json; charset=UTF-8');
        $error_msg = "PHP Load error: ".$e->getMessage();
        // exits the program and sends json contianing error
        exit(json_encode(array("message" => "$error_msg")));
    }
    return $jsonArray;
}

function getDepartments($connection){
	$jsonArray = array();
	$deptArray = array();
      $sqlstmt = "SELECT surveyJSON
			FROM Survey
			WHERE currentTIP = 1";
    try {
        $statement = $connection->prepare($sqlstmt);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $jsonData = $statement->fetchAll();
        // $jsonArray = array('data' => $jsonData);
    }  catch (PDOException $e) {
      // returns internal server error if no table found
        header('HTTP/1.1 500 Internal Server Error');
        header('Content-Type: application/json; charset=UTF-8');
        $error_msg = "PHP Load error: ".$e->getMessage();
        // exits the program and sends json contianing error
        exit(json_encode(array("message" => "$error_msg")));
    }
    // return $jsonArray;
    return json_encode($jsonData);
    // $deptArray = array('data' => $jsonData);

}


function getTotalSubmissions($connection){
      $sqlstmt = "SELECT count(*)
			FROM Answer";
    try {
        $statement = $connection->prepare($sqlstmt);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $jsonData = $statement->fetchAll();
        $jsonArray = array('data' => $jsonData);
    }  catch (PDOException $e) {
      // returns internal server error if no table found
        header('HTTP/1.1 500 Internal Server Error');
        header('Content-Type: application/json; charset=UTF-8');
        $error_msg = "PHP Load error: ".$e->getMessage();
        // exits the program and sends json contianing error
        exit(json_encode(array("message" => "$error_msg")));
    }
    return json_encode($jsonData);

}

//returns the number of TIPs in-progress
function getSubmissionsInProgress($connection){
      $sqlstmt = "SELECT count(*)
			From Answer
			Where complete = 0";
    try {
        $statement = $connection->prepare($sqlstmt);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $jsonData = $statement->fetchAll();
        $jsonArray = array('data' => $jsonData);
    }  catch (PDOException $e) {
      // returns internal server error if no table found
        header('HTTP/1.1 500 Internal Server Error');
        header('Content-Type: application/json; charset=UTF-8');
        $error_msg = "PHP Load error: ".$e->getMessage();
        // exits the program and sends json contianing error
        exit(json_encode(array("message" => "$error_msg")));
    }
    return json_encode($jsonData);
}

//returns the number of TIPs complete
function getSubmissionsComplete($connection){
      $sqlstmt = "SELECT count(*)
			From Answer
			Where complete = 1";
    try {
        $statement = $connection->prepare($sqlstmt);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $jsonData = $statement->fetchAll();
        $jsonArray = array('data' => $jsonData);
    }  catch (PDOException $e) {
      // returns internal server error if no table found
        header('HTTP/1.1 500 Internal Server Error');
        header('Content-Type: application/json; charset=UTF-8');
        $error_msg = "PHP Load error: ".$e->getMessage();
        // exits the program and sends json contianing error
        exit(json_encode(array("message" => "$error_msg")));
    }
    return json_encode($jsonData);
}

//returns the number of TIPs complete
function getSubmissionsNotStarted($connection){
      $sqlstmt = "SELECT count(*)
			From Answer
			Where complete = null";
    try {
        $statement = $connection->prepare($sqlstmt);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $jsonData = $statement->fetchAll();
        $jsonArray = array('data' => $jsonData);
    }  catch (PDOException $e) {
      // returns internal server error if no table found
        header('HTTP/1.1 500 Internal Server Error');
        header('Content-Type: application/json; charset=UTF-8');
        $error_msg = "PHP Load error: ".$e->getMessage();
        // exits the program and sends json contianing error
        exit(json_encode(array("message" => "$error_msg")));
    }
    return json_encode($jsonData);
}

function getSubmissionsByDepartment($connection){
      $sqlstmt = "SELECT answerID, answerJSON
			FROM Answer;";
    try {
        $statement = $connection->prepare($sqlstmt);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $jsonData = $statement->fetchAll();
        $jsonArray = array('data' => $jsonData);
    }  catch (PDOException $e) {
      // returns internal server error if no table found
        header('HTTP/1.1 500 Internal Server Error');
        header('Content-Type: application/json; charset=UTF-8');
        $error_msg = "PHP Load error: ".$e->getMessage();
        // exits the program and sends json contianing error
        exit(json_encode(array("message" => "$error_msg")));
    }
    return json_encode($jsonData);
}

function saveAsPDF($html) {
	$dompdf = new Dompdf();
	$dompdf->loadHtml($html);
	$dompdf->render();
	// (Optional) Setup the paper size and orientation
	$dompdf->setPaper('A4', 'landscape');
	$pdf = $dompdf->output();
	@file_put_contents(UPLOAD_DIRECTORY."report.pdf", $pdf);
	echo UPLOAD_DIRECTORY. "report.pdf";
}

function saveAsCSV($dataArray) {
	$directory = 'report.csv';
	$jsonData = json_encode($dataArray);
	$decodedData = json_decode($jsonData, true);
	$file = fopen($directory, 'w');
	foreach ($decodedData as $row) {
		fputcsv($file, $row);
	}
	fclose($file);
	echo $directory;
}

function getDivisionLearningOutomes($connection){

 $sqlstmt = "SELECT answerJSON
			FROM Answer;";
    try {
        $statement = $connection->prepare($sqlstmt);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $jsonData = $statement->fetchAll();
        $jsonArray = array('data' => $jsonData);
    }  catch (PDOException $e) {
      // returns internal server error if no table found
        header('HTTP/1.1 500 Internal Server Error');
        header('Content-Type: application/json; charset=UTF-8');
        $error_msg = "PHP Load error: ".$e->getMessage();
        // exits the program and sends json contianing error
        exit(json_encode(array("message" => "$error_msg")));
    }
    return json_encode($jsonData);
}

?>

                    

