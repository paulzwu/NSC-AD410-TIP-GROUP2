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
	$lastid = '';

	// tries to update row if row exists, else it inserts new row
	$sql1 = "UPDATE ANSWER SET answerJSON = '$quiz_answer', complete = '$flag', time_complete = '$date'
		WHERE answerID = (SELECT a.answerID FROM USR_JOIN_ANS_JOIN_SUR a JOIN ANSWER b ON a.answerID = b.answerID
							JOIN USERS c ON a.userID = c.userID JOIN SURVEY d ON a.surveyID = d.surveyID
							WHERE d.currentTIP = '1' AND c.userID = (SELECT userID FROM USERS WHERE oauthID = '$oauthID'));";
	// if the above does not change any rows, this will insert rows
	$sql2 = "INSERT INTO ANSWER(answerJSON,complete,time_complete) VALUES ('$quiz_answer','$flag','$date');";

	try {
		// runs statement that updates row if it exists
		$statement = $connection->prepare($sql1);
		$statement->execute();
		// if rowCount returns 0, no rows updated
		$count = $statement->rowCount();
		$lastid = $connection->lastInsertId();
		//echo $lastid;
		if($count =='0'){
			// so this sql statement is ran to insert the new row
			$statement = $connection->prepare($sql2);
			$statement->execute();
			$lastid = $connection->lastInsertId();
			// assumes that row exists (it will be created elsewhere so it should always exist)
			// and only runs when a new row is inserted into answer table
			$sql4 = "UPDATE USR_JOIN_ANS_JOIN_SUR SET answerID = '$lastid'
								WHERE userID = (SELECT userID FROM USERS WHERE oauthID = $oauthID)
								AND surveyID = (SELECT surveyID	FROM SURVEY WHERE currentTIP = '1');";
			// this updates the joining table with answer id
			// this table will have its rows inserted elsewhere
			$statement = $connection->prepare($sql4);
			$statement->execute();
			echo "insert successful";
		}
		else {
		  echo "update successful";
		}

		$connection = NULL;
	} catch (PDOException $e) {
		echo "PHP Save error: ".$e->getMessage();
	}

?>
