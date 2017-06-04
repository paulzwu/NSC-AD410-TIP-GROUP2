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
		$modalHeader = 'TIP Response Rates By Department';
		$modalDescription = 'This report represents the TIP participation rates for each division. The percentage is in relation to the total number of submissions received for the specified time period.'

		$table = 'SURVEY';
		$col1 = 'surveyID';
		$col2 = 'surveyJSON';
		$col3 = 'surveyName';
		$sqlstmt = "SELECT SUM(*) FROM ANSWER VALUES ('$valid_json', '$surveyName');";
		try {
			$statement = $conn->prepare($sqlstmt);
			$statement->execute();
			$conn = NULL;
		} catch (PDOException $e) {
			echo "PHP Save error: ".$e->getMessage();
		}
		break;
	case 'divisionCompletion':
		$reportHeader = 
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
}
?>
