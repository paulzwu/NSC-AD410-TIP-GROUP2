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
    $statement = $connection->prepare($sqlstmt1);
    $statement->execute();
    $statement = $connection->prepare($sqlstmt2);
    $statement->execute();
    $connection = NULL;
} catch (PDOException $e) {
    echo "PHP Delete error: ".$e->getMessage();
}
?>