<?php
	/*
	 * queries user info and returns the answer id that corresponds to the
   * users current TIP
	 */

	 include "db_connect.php";
  // this is a placeholder until oauth is set up
	$oID = '556688';//$_SESSION[OAUTH_ID];
	$table1 = 'USR_JOIN_ANS_JOIN_SUR';
  $table2 = 'SURVEY';
  $table3 = 'USERS';
  $table4 = 'ANSWER';
	$col1 = 'surveyID';
	$col2 = 'userID';
  $col3 = 'answerID';
  $col4 = 'oauthID';
  $col5 = 'currentTIP';
  $col6 = 'complete';
  $col7 = 'answerJSON';
  $col8 = 'surveyJSON';
  $surveyInfo = array();
	$sqlstmt = "SELECT d.$col6, d.$col7, b.$col8
              FROM $table1 a
              JOIN $table2 b
              ON a.$col1 = b.$col1
              JOIN $table3 c
              ON a.$col2 = c.$col2
              LEFT JOIN $table4 d
              ON a.$col3 = d.$col3
              WHERE b.$col5 = '1' AND c.$col4 = '$oID';";

  // the query without all the variables:
  // SELECT d.complete, a.answerID, b.surveyJSON
  // FROM USR_JOIN_ANS_JOIN_SUR a
  // JOIN SURVEY b
  // ON a.surveyID = b.surveyID
  // JOIN USERS c
  // ON a.userID = c.userID
  // LEFT JOIN ANSWER d
  // ON a.answerID = d.answerID
  // WHERE b.currentTIP = '1' AND c.oauthID = '123456';

	try {
		$statement = $connection->prepare($sqlstmt);
		$statement->execute();
		$result = $statement->fetchall(PDO::FETCH_ASSOC);
    foreach($result as $row) {
      $surveyInfo = $row;
    }
		$connection = NULL;
	} catch (PDOException $e) {
		echo "PHP Load error: ".$e->getMessage();
	}
  if ($surveyInfo == null || $surveyInfo == '') {
    echo "NULL";
  } else {
		echo json_encode($surveyInfo);
  }
?>
