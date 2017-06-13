<?php
	/*
	 * Delete survey data from DB
	*/

	include "db_connect.php";

	$surveyID = (isset($_POST['ID'])) ? $_POST['ID'] : "";
	$table = 'SURVEY';
	$col1 = 'surveyID';
	$sqlstmt = "DELETE FROM $table WHERE $col1 = '$surveyID';";
	try {
		$statement = $connection->prepare($sqlstmt);
		$statement->execute();
		$connection = NULL;
	} catch (PDOException $e) {
		echo "PHP Delete error: ".$e->getMessage();
	}
?>
