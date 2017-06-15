<?php
/*
 * Saves survey answers to DB
 */
	include "db_connect.php";

	$oauthID = '110099'; // $_SESSION[OAUTH_ID];

	$flag = (isset($_POST['Complete'])) ? $_POST['Complete'] : "";
	$quiz_answer = (isset($_POST['Responses'])) ? $_POST['Responses'] : "";
	$date = date('Y-m-d h:i:s');

	$table1 = 'ANSWER';
	$table2 = 'USERS';
	$table3 = 'SURVEY';
	$table4 = 'USR_JOIN_ANS_JOIN_SUR';

	$col1 = 'answerID';
	$col2 = 'answerJSON';
	$col3 = 'complete';
	$col4 = 'time_complete';
	$col5 = 'userID';
	$col6 = 'oauthID';
	$col7 = 'currentTIP';
	$col8 = 'surveyID';
	$ansID = '';

	// tries to update row if row exists, else it inserts new row
	$sql1 = "UPDATE $table1 SET $col2 = '$quiz_answer', $col3 = '$flag', $col4 = '$date'
		WHERE $col1 = (SELECT a.answerID FROM USR_JOIN_ANS_JOIN_SUR a JOIN ANSWER b ON a.answerID = b.answerID
							JOIN USERS c ON a.userID = c.userID JOIN SURVEY d ON a.surveyID = d.surveyID
							WHERE d.currentTIP = '1' AND c.oauthID = '$oauthID');";

	$sql2 = "INSERT INTO $table1($col2,$col3,$col4) VALUES ('$quiz_answer','$flag','$date');";

	// assumes that row exists (it will be created elsewhere so it should always exist)
	$sql3 = "UPDATE $table4 SET $col2 = (SELECT $col2 FROM $table1 WHERE $col4 = $date)
		WHERE $col5 = (SELECT $col5 FROM $table2 WHERE $col6 = $oauthID) AND $col8 = (SELECT $col8
		 FROM $table3 WHERE $col7 = '1');";

	$sql4 = "SELECT a.answerID FROM USR_JOIN_ANS_JOIN_SUR a JOIN ANSWER b ON a.answerID = b.answerID
						JOIN USERS c ON a.userID = c.userID JOIN SURVEY d ON a.surveyID = d.surveyID
						WHERE d.currentTIP = '1' AND c.oauthID = '$oauthID';";

	try {
		$statement = $connection->prepare($sql1);
		$statement->execute();
    // this counts how many rows were affected; since we are only affecting 1 at a time...
    // $count = $statement->rowCount();
		// echo $count;
    // we check to see if zero rows were affected; if so, we insert instead of update
    // if($count == 0) {
    //   $statement = $connection->prepare($sql2);
  	// 	$statement->execute();
    // }
    // this updates the joining table with answer id
    // this table will have it rows inserted elsewhere
    $stmnt = $connection->prepare($sql3);
		$stmnt->execute();
		$connection = NULL;
	} catch (PDOException $e) {
		echo "PHP Save error: ".$e->getMessage();
	}

?>
