<?php

  include "db_connect.php";

  $file_name = "results.json";

  if (file_exists($file_name)) {
    unlink($file_name);
    touch($file_name);
  } else {
    touch($file_name); 
  }

  $table = "ANSWER";
  $table_data = "answerJSON";

  $sql="select * from $table";

  $response = array();
  $posts = array();
  try {
  	$stmt = $conn->prepare($sql);
  	$stmt->execute();
  	$result = $stmt->fetchall(PDO::FETCH_ASSOC);
  	foreach($result as $row) {
  		$response[] = array(json_encode($row, JSON_PRETTY_PRINT));
  	}

  	$inputValue = '';
  	foreach($response as $k=>$v) {
  		$inputValue = $inputValue . stripcslashes(stripcslashes(trim(implode($v))));
  	}
  	$fp = fopen('results.json', 'a');
    $json_output = preg_replace("(}{)", "}, {", preg_replace("(^{)", "[ {", preg_replace("(}$)", "} ]", $inputValue)));
  	fwrite($fp, $json_output);
  	fclose($fp);

    // uncomment the next line for testing purposes
    //echo "<pre>" . file_get_contents('results.json') . "</pre>";

  	$conn = NULL;
  } catch (PDOException $e) {
  	echo "PHP Load error: ".$e->getMessage();
  }

?>
