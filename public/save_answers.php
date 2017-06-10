<?php
/*
 * Saves survey answers to DB
 */

	include "db_connect.php";

	$quiz_answer = (isset($_POST['Responses'])) ? $_POST['Responses'] : "";
	$table = 'ANSWER';
	$col1 = 'answerID';
	$col2 = 'answerJSON';
	$sqlstmt = "INSERT INTO $table($col2) VALUES ('$quiz_answer');";
	try {
		$statement = $connection->prepare($sqlstmt);
		$statement->execute();
		$conn = NULL;
	} catch (PDOException $e) {
		echo "PHP Save error: ".$e->getMessage();
}

?>
