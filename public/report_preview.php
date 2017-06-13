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
	case 'submissionStats':
		// $modalHeader = 'TIP Response Rates By Department';
		// $modalDescription = 'This report represents the TIP participation rates for each division. The percentage is in relation to the total number of submissions received for the specified time period.'
		// $table = 'SURVEY';
		// $col1 = 'surveyID';
		// $col2 = 'surveyJSON';
		// $col3 = 'surveyName';
		// $sqlstmt = "SELECT SUM(*) FROM ANSWER VALUES ('$valid_json', '$surveyName');";
		// try {
		// 	$statement = $conn->prepare($sqlstmt);
		// 	$statement->execute();
		// 	$conn = NULL;
		// } catch (PDOException $e) {
		// 	echo "PHP Save error: ".$e->getMessage();
		// }
		break;

	case 'divisionCompletionModal':
			$dummyJSON = '{
						"modalHeader": "TIP Participation Rate By Department",
						"modalDescription": "This report represents the rates of participation for each division. The percentage of participation is measured in relation to the total number of submissions received for the time period specified.",
						"academicYears": ["<option>2016-2017</option>"]
					}';
			echo $dummyJSON;
			break;

	case 'divisionCompletion':
		$dummyJSON = '{
		"TotalSurveys": 53,
		"AHSS": 10,
		"BEIT": 5,
		"BTS": 2,
		"HHS": 5,
		"LIB": 15,
		"M&S": 16
		}';
		echo $dummyJSON;
		break;

	case 'exportReport':
		$startDate = $_POST['startDate'];
		$endDate = $_POST['endDate'];
		$exportType = $_POST['exportType'];
		if (!empty($startDate) && !empty($endDate) && !empty($exportType)) {
			$array = getDepartmentData($connection, $startDate, $endDate);
			$dataArray = $array['data'];
			$html = "<html><body><table border='1'>";
			for($i = 0; $i < count($dataArray); $i++) {
				$html .= "<tr>
					        <td>" . $dataArray[$i]['answerID'] . "</td>
				            <td>" . $dataArray[$i]['answerJSON'] . "</td>
				            <td>" . $dataArray[$i]['complete'] . "</td>
				            <td>" . $dataArray[$i]['time_complete'] . "</td>
			      		</tr>";
			}
			$html .= "</table></body></html>";
			if ($exportType == 'PDF') {
				saveAsPDF($html);
			} else {
				saveAsCSV($dataArray);
			}
 			//exit($jsonArray);
		}
		break;

	case 'trendingTopics':
		# code...
		break;

	case 'learningOutcomes':
		# code...
		break;

	default:
		# code...
		break;
// 		SELECT  *
// FROM    Product_sales 
// WHERE   From_date >= '2013-01-03' AND
//         To_date   <= '2013-01-09'
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

	// $excel = new SimpleExcel('json');
	// $excel->parser->loadString($jsonData); // Load HTML file from server
	// $excel->convertTo('CSV'); // Save into a directory in running server
	// $excel->writer->saveFile('Report', $_SERVER['DOCUMENT_ROOT']);
	// //@file_put_contents(."report.csv", $csv);
	// echo UPLOAD_DIRECTORY. "report.csv";
}

?>

                    

