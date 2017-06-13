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
	
	try {
		$statement = $connection->prepare($sqlstmt);
		$statement->execute();
	} catch (PDOException $e) {
		echo "PHP Save error: ".$e->getMessage();
	}
	
	$connection = NULL;
?>
