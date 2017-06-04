<?php
		$quiz_answer = (isset($_POST['Responses'])) ? $_POST['Responses'] : "";
		$table = 'ANSWER';
		$col1 = 'answerID';
		$col2 = 'answerJSON';
		$sqlstmt = "INSERT INTO $table($col2) VALUES ('$quiz_answer');";
		try {
			$conn = new PDO("sqlite:DB/db.sqlite");
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$statement = $conn->prepare($sqlstmt);
			$statement->execute();
			$conn = NULL;
		} catch (PDOException $e) {
			echo "PHP Save error: ".$e->getMessage();
		}
?>
