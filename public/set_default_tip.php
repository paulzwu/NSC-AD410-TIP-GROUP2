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
  $sqlstmt1 = "UPDATE $table SET $col2 = '1' WHERE $col1 = '$newTIP';";
  $sqlstmt2 = "UPDATE $table SET $col2 = '0' WHERE $col1 = '$oldTIP';";
  try {
<<<<<<< HEAD
    $statement = $connection->prepare($sqlstmt);
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
=======
		$statement = $connection->prepare($sqlstmt1);
		$statement->execute();

    $statement = $connection->prepare($sqlstmt2);
		$statement->execute();
		$connection = NULL;
	} catch (PDOException $e) {
		echo "PHP Delete error: ".$e->getMessage();
	}

>>>>>>> ad5581bce631c3345e7d325c6d90b6d4f51a74ac
?>
