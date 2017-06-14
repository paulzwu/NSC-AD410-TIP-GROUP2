<?php
/*
 * Saves survey answers to DB
 */
	include "db_connect.php";
	$quiz_answer = (isset($_POST['Responses'])) ? $_POST['Responses'] : "";
	$date = date("m d Y H i s");
	$flag = '1';
	$table = 'ANSWER';
	$col1 = 'answerID';
	$col2 = 'answerJSON';
	$col3 = 'complete';
	$col4 = 'time_complete';
	$sqlstmt = "INSERT INTO $table($col2, $col3, $col4) VALUES ('$quiz_answer', '$flag', '$date');";
	
	$oauthID = '123456'; // Place holder for oauthID
	$sqlstmt2 = "SELECT userID FROM USERS WHERE oauthID = '$oauthID';";
	$sqlstmt3 = "SELECT $col1 FROM $table WHERE $col4 = '$date';";
	
	try {
		$statement = $connection->prepare($sqlstmt);
		$statement->execute();
		
		$statement = $connection->prepare($sqlstmt2);
		$statement->execute();
		$userID = $statement->fetchColumn(0);
		
		$statement = $connection->prepare($sqlstmt3);
		$statement->execute();
		$answerID = $statement->fetchColumn(0);
	} catch (PDOException $e) {
		echo "PHP Save error: ".$e->getMessage();
	}
	
	$sqlstmt4 = "INSERT INTO USR_JOIN_ANS_JOIN_SUR(answerID, userID) VALUES('$answerID', '$userID');";
	
	try {
		$statement = $connection->prepare($sqlstmt4);
		$statement->execute();
	} catch (PDOException $e) {
		echo "PHP Save error: ".$e->getMessage();
	}

	$connection = NULL;
?>
