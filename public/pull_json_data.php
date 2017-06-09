<?php

  //--------------------------------------------------------\\
  // comments for those who may want to edit this file_name \\
  //--------------------------------------------------------\\

  // this includes a db connection script. if you dont want to use it,
  // copy the scripts contents into here and make changes (also remove the include)

  include "db_connect.php";

  // placeholder - this value is populated by whatever you are searching for
  // or wanting. this may be changed in the future...

  $ID = "1";
  $data = array();

  // this is a sqlite statement that joins several databases
  // the USR_JOIN_ANS_JOIN_SUR is the lynchpin here, as it contains
  // ids from the other three tables, and it is what links everything together

  $sql="SELECT b.name, b.email, c.answerJSON, c.complete, c.time_complete
        FROM USR_JOIN_ANS_JOIN_SUR a
        	LEFT JOIN USERS b
        	ON a.userID = b.userID
        	LEFT JOIN ANSWER c
        	ON a.answerID = c.answerID
        	LEFT JOIN SURVEY d
        	ON a.surveyID = d.surveyID
        WHERE d.surveyID = '1'";

  // name of the file where everything will be saved to

	$file_name = "results.json";

  // this bit of logic looks to see if file exists; if it does exist, it will
  // delete it (that is what unlink does) and then create an empty file (that is
  // what touch does).
  // otherwise, the file is created

	if (file_exists($file_name)) {
		unlink($file_name);
		touch($file_name);
	} else {
		touch($file_name);
	}

  // try/catch that runs all code that fetches info from db

	try {
		$stmt = $conn->prepare($sql);
		$stmt->execute();

    // this fetches all results and formats them into an associative array

		$result = $stmt->fetchall(PDO::FETCH_ASSOC);

    // this opens the file we made in the above if/else block
    // it opens it in append mode, which means that it will add stuff to
    // the end of the file

		$fp = fopen('results.json', 'a');

    // this sets variable equal to whatever the output of jsonProcess is
    // but it formats it as an associative array

		$json_output = json_decode(jsonProcess($result), true);

    // this writes the above variable into the file created earlier
    // it converts the data as a json array, and formats it in a pretty, easy
    // to read string

		fwrite($fp, json_encode($json_output, JSON_PRETTY_PRINT));
		fclose($fp);

		// uncomment the next line for testing purposes
		echo "<pre>" . file_get_contents('results.json') . "</pre>";

		$conn = NULL;
	} catch (PDOException $e) {
		echo "PHP Load error: ".$e->getMessage();
	}


  // this function processes the output from the database

	function jsonProcess ($input) {
    $new_input = parseData($input);
		$inputValue = '';

    // this goes through each row from the db, converts it to a string,
    // then puts it into an associative array

		foreach($new_input as $row) {
			$data[] = array(json_encode($row));
		}

    // this loops through the associative array above and converts each key/value
    // pair into a string

		foreach($data as $k=>$v) {
			$inputValue = $inputValue . implode($v);
		}

    //it then returns a string that meets formal JSON requirements
    // (copy/paste contents of json file into this validator to see that it is
    // valid: https://jsonlint.com/)

		return preg_replace("(}{)", "}, {", preg_replace("(^{)", "[ {",
            preg_replace("(}$)", "} ]", stripslashes(str_replace("\"{", "{",
            str_replace("}\"", "}", $inputValue))))));
	}

  function parseData($input) {
    $field = 'answerJSON';
    $newKey = array('Division', 'Course_ID', 'Course_Prefix');
    for($i = 0; $i < count($input); $i++) {
      for($j = 0; $j < 3; $j++) {
        $q = 'question' . ($j + 1);
        $answerOutput = json_decode($input[$i][$field], true);
        $new_keyVal = $answerOutput[$q];
        //print_r($answerOutput);
        //echo "<br><br>" . $new_keyVal . "<br><br>";
        $input[$i] += array($newKey[$j] => $new_keyVal);
      }
      $input[$i] += array('Share' => $answerOutput['question17']);
    }
    //print_r($input);
    return $input;
  }

?>
