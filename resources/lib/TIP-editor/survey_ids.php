<?php
  /*
   * Retrieves survey names from DB for populating in a select element
   */
  $table = 'Surveys';
  $col1 = 'surveyID';
  $col2 = 'surveyName';
  $sqlstmt = "SELECT $col1, $col2 FROM $table;";
  try {
    $conn = new PDO("sqlite:DB/tip-editor-testDB.sqlite");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $statement = $conn->prepare($sqlstmt);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $jsonData = $statement->fetchAll();
    $jsonArray = array('surveyInfo'=>$jsonData);
    echo json_encode($jsonArray);
    $conn = NULL;
  } catch (PDOException $e) {
    echo "PHP Load error: ".$e->getMessage();
  }
?>
