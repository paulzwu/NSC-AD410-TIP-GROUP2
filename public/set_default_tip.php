<?php
  /*
   * Retrieves survey names from DB for populating in a select element
   */

  include "db_connect.php";

  $newTIP = (isset($_POST['ID'])) ? $_POST['ID'] : "";
  $oldTIP = (isset($_POST['oldID'])) ? $_POST['oldID'] : "";
  $table = 'SURVEY';
  $col1 = 'surveyID';
  $col2 = 'currentTIP';
  $sqlstmt = "SELECT $col1, $col2, $col3 FROM $table;";
  try {
    $statement = $conn->prepare($sqlstmt);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $jsonData = $statement->fetchAll();
    $jsonArray = array('surveyInfo'=>$jsonData);
  // returns surveyID of 0 if jsonArray is empty, else returns jsonArray
  if (in_array(null, $jsonArray)) {
  	echo "{\"surveyInfo\":[{\"surveyID\":\"0\",\"surveyName\":\"none\",\"currentTIP\":\"0\"}]}";
  } else {
  	echo JSON_encode($jsonArray);
  }
    $conn = NULL;
  } catch (PDOException $e) {
    // returns internal server error if no table found
  	header('HTTP/1.1 500 Internal Server Error');
  	header('Content-Type: application/json; charset=UTF-8');
  	$error_msg = "PHP Load error: ".$e->getMessage();
  	// exits the program and sends json contianing error
  	exit(json_encode(array("message" => "$error_msg")));
  }
?>
