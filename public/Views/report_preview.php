<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
// include  'config.php';
// openOrCreateDB();

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
		# code...
		break;
	case 'divisionCompletion':
		# code...
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
