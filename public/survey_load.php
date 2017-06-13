<?php
	/*
	 * Retrieves a survey JSON object from DB
	 */

	 include "db_connect.php";

	$surveyID = (isset($_POST['ID'])) ? $_POST['ID'] : "";
	$table = 'SURVEY';
	$col1 = 'surveyID';
	$col2 = 'surveyJSON';
	$sqlstmt = "SELECT $col2 FROM $table WHERE $col1 = '$surveyID';";
	try {
		$statement = $connection->prepare($sqlstmt);
		$statement->execute();
		$surveyData = $statement->fetchColumn();
		$connection = NULL;
	} catch (PDOException $e) {
		echo "PHP Load error: ".$e->getMessage();
	}
		print_r($surveyData);

?>
