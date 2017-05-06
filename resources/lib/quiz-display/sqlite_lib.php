<?php
	// this logic checks the post action variable
	// if it is load, calls getSurvey()
	// if it is save, calles sendAnswers()
	// if for some reason it is neither, outputs error to console
	if ($_POST['action'] == "load"){
		getSurvey();
	} else if ($_POST['action'] == "save"){
		sendAnswers();
	} else {
		echo "ERROR: Invalid request: Wrong action sent";
	}
	
	/*
	 * Retrieves a survey JSON object from DB
	 */
	
	function getSurvey() {
		$surveyID = (isset($_POST['ID'])) ? $_POST['ID'] : "";
		$table = 'survey';
		$col1 = 'survey_num';
		$col2 = 'survey_json';
		$sqlstmt = "SELECT $col2 FROM $table WHERE $col1 = '$surveyID';";
		try {
			$conn = new PDO("sqlite:DB/test.sqlite");
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$statement = $conn->prepare($sqlstmt);
			$statement->execute();
			$surveys = $statement->fetchColumn();
			$conn = NULL;
		} catch (PDOException $e) {
			echo "PHP Load error: ".$e->getMessage();
		}
		echo JSON_encode($surveys);
	}

	/*
	 * Sends answer JSON object to DB
	 */
	function sendAnswers() {
		$quiz_answer = (isset($_POST['Responses'])) ? $_POST['Responses'] : "";
		$table = 'answers';
		$col1 = 'answerID';
		$col2 = 'answer';
		$sqlstmt = "INSERT INTO answers(answer) VALUES ('$quiz_answer');";
		try {
			$conn = new PDO("sqlite:DB/test.sqlite");
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$statement = $conn->prepare($sqlstmt);
			$statement->execute();
			$conn = NULL;
		} catch (PDOException $e) {
			echo "PHP Save error: ".$e->getMessage();
		}
	}
?>
