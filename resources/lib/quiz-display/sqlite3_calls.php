<?php


	// this logic checks the post action variable
	// if it is load, calls getSurvey()
	// if it is save, calles sendAnswers()
	// if for some reason it is neither, outputs error to console
	if ($_POST['action'] == "load"){
		getSurvey();
	} else if ($_POST['action'] == "save"){
		sendAnswers();
	} else {// these console echos do not appear to work
		echo '<script>console.log("ERROR: Invalid request: Wrong action sent")</script>';
	}
	
	/*
	 * Retrieves a survey JSON object from DB
	 *
	 * @param  Survey ID from dropdown?
	 * @return A JSON object to use with Survey editor
	 */
	
	function getSurvey() {
		$surveyID = (isset($_POST['ID'])) ? $_POST['ID'] : "";
		$table = 'survey';
		$col1 = 'survey_num';
		$col2 = 'survey_json';
		$sqlstmt = "SELECT $col2 FROM $table WHERE $col1 = '$surveyID';";
		try {
			$conn = new PDO("sqlite:DB/test.sqlite");
			$statement = $conn->prepare($sqlstmt);
			$statement->execute();
			$surveys = $statement->fetchColumn();
			//$statement->closeCursor();
		} catch (PDOException $e) {
			echo '<script>console.log("PHP Load error: $e->getMessage()")</script>';
		}
		echo JSON_encode($surveys);
	}

	/*
	 * Sends JSON object of answers to Answer table
	 *
	 * @param $answer    A JSON object of answers
	 * @param $answerID  DB ID for answer
	 * @param $FacultyID DB ID for faculty taking TIP
	 * @param $surveyID  DB ID for survey being taken
	 */
	// this not implemented yet
	/*function sendAnswers() {
		$answer = $answerID = $FacultyID = $surveyID = '';
		$sqlstmt = "REPLACE INTO Answers (AnswerID, Answer) VALUES ('$answerID', '$answer');";
		try {
			$conn = new PDO("sqlite:DB/test.sqlite");
			// If a primary key constraint violation happens, delete existing row then insert new row 
			//If primary key does not exist, insert new row
			$statement = $conn->prepare($sqlstmt);
			$statement->execute();
			$statement->closeCursor();
		} catch (PDOException $e) {
			echo '<script>console.log("PHP Save error: $e->getMessage()")</script>';
		}
	}*/

	//can't seem to get this function to work - get a fatal error
	/*
	function connection() {
		try {
		//open the database - creates the db if file not present
		$conn = new PDO("sqlite:DB/test.sqlite");
		// sets attributes to catch errors
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		// sends output to console
		echo '<script>console.log("Connection successfull")</script>';
		}
		catch(PDOException $e) {
			echo '<script>console.log("PHP Connection error: $e->getMessage()")</script>';
		}
	}
	*/	
?>
