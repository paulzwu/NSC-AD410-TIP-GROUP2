<?php

  include "db_connect.php";

  $data = array();
  $sql="SELECT b.name, d.surveyJSON, c.answerJSON, c.time_complete
			FROM USR_JOIN_ANS_JOIN_SUR a
				INNER JOIN USERS b
					ON a.userID = b.userID
				INNER JOIN ANSWER c
					ON a.answerID = c.answerID
				INNER JOIN SURVEY d
					ON a.surveyID = d.surveyID
			WHERE d.surveyID = '1';";
	$file_name = "results.json";

	if (file_exists($file_name)) {
		unlink($file_name);
		touch($file_name);
	} else {
		touch($file_name);
	}

	try {
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchall(PDO::FETCH_ASSOC);
		$fp = fopen('results.json', 'a');
		$json_output = jsonProcess($result);
		fwrite($fp, $json_output);
		fclose($fp);
		//print_r("<pre>" . JSON_encode($surveyJSON) . "<br><br>" . $answerJSON . "<br><br>" . $json_output);
		// uncomment the next line for testing purposes
		echo "<pre>" . file_get_contents('results.json') . "</pre>";
		$conn = NULL;
	} catch (PDOException $e) {
		echo "PHP Load error: ".$e->getMessage();
	}

	function jsonProcess ($input) {
		$inputValue = '';
		foreach($input as $row) {
			//$surveyJSON = $row['surveyJSON'];
			//$answerJSON = $row['answerJSON'];
			$data[] = array(JSON_encode($row));
		}
		foreach($data as $k=>$v) {
			$inputValue = $inputValue . str_replace("\"", "\\\"", str_replace("\"{", "{", preg_replace("~\\\\+([\"\'\\x00\\\\])~", "$1", implode($v))));
			//$inputValue = $inputValue .JSON_encode($v, JSON_PRETTY_PRINT);
		}
		return preg_replace("(}{)", "}, {", preg_replace("(^{)", "[ {", preg_replace("(}$)", "} ]", $inputValue)));

	}

?>
