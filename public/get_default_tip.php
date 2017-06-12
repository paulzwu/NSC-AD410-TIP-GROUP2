<?php
  /*
   * finds the current default TIP in the db and returns it to tip_viewer.js
   */

  include "db_connect.php";

	$table = 'SURVEY';
	$col1 = 'currentTIP';
	$col2 = 'surveyJSON';
	$sqlstmt = "SELECT $col2 FROM $table WHERE $col1 = '1';";
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
