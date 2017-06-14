<?php
/*
 * Saves survey answers to DB
 */
	include "db_connect.php";

	$oauthID = '110099'; // $_SESSION[OAUTH_ID];

	$quiz_answer = (isset($_POST['Responses'])) ? $_POST['Responses'] : "";
	$date = date('Y-m-d h:i:s');
	$flag = '1';

	$table1 = 'ANSWER';
	$table2 = 'USERS';
	$table3 = 'SURVEY'
	$table4 = 'USR_JOIN_ANS_JOIN_SUR';
	
	$col1 = 'answerID';
	$col2 = 'answerJSON';
	$col3 = 'complete';
	$col4 = 'time_complete';
	$col5 = 'userID';
	$col6 = 'oauthID';
	$col7 = 'currentTIP';
	$col8 = 'surveyID';

	$sqlstmt1 = "INSERT INTO $table1($col2, $col3, $col4) VALUES ('$quiz_answer', '$flag', '$date');";
	$sqlstmt3 = "UPDATE $table4 SET $col1 = (SELECT $col1 FROM $table1 WHERE $col4 = '$date')
							 WHERE $col5 = (SELECT $col5 FROM $col2 WHERE $col6 = '$oauthID') AND $col8 =
							(SELECT $col8 FROM $table3 WHERE $col7 = '$flag');"

	try {
		$statement = $connection->prepare($sqlstmt1);
		$statement->execute();

		$statement = $connection->prepare($sqlstmt3);
		$statement->execute();

		$connection = NULL;
	} catch (PDOException $e) {
		echo "PHP Save error: ".$e->getMessage();
	}

?>
