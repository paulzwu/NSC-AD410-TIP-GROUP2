<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include  'config.php';
// openOrCreateDB();
include "db_connect.php";

function is_ajax_request(){
	return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
	$_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
}

if(!is_ajax_request()){
	exit;
}
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
?>

                    

