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
		$statement = $conn->prepare($sqlstmt);
		$statement->execute();
		$surveyData = $statement->fetchColumn();
		$conn = NULL;
	} catch (PDOException $e) {
		echo "PHP Load error: ".$e->getMessage();
	}
		print_r($surveyData);

?>
