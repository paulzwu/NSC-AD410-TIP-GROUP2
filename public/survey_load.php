<?php
	/*
	 * Retrieves a survey JSON object from DB
	 */
	$surveyID = (isset($_POST['ID'])) ? $_POST['ID'] : "";
	$table = 'SURVEY';
	$col1 = 'surveyID';
	$col2 = 'surveyJSON';
	$sqlstmt = "SELECT $col2 FROM $table WHERE $col1 = '$surveyID';";
	try {
		$conn = new PDO("sqlite:DB/db.sqlite");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$statement = $conn->prepare($sqlstmt);
		$statement->execute();
		$surveyData = $statement->fetchColumn();
		$conn = NULL;
	} catch (PDOException $e) {
		echo "PHP Load error: ".$e->getMessage();
	}
		print_r($surveyData);

?>
