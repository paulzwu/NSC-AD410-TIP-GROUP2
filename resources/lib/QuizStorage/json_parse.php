<?php
//initialize count:

$AHSS = 0;
$BEIT = 0;
$BTS = 0;
$HHS = 0;
$LIB = 0;
$MS = 0;
//connect to db
try {
	$conn = new PDO("sqlite:database_v_3.sqlite");
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
	echo "Can't connet to DB: ".$e->getMessage();
	}
	
//sql statement
$sql = "SELECT answer_data FROM Answers;";

//query
$result = $conn->query($sql);
foreach($result as $row) {
			$answer_data = $row['answer_data'];
			$json = $answer_data;

			//get data
			$answers = json_decode($json);
			$course = $answers->{'question1'};
			switch ($course){
				case ("AHSS"):
				$AHSS++;
				break;
			case ("BEIT"):
				$BEIT++;
				break;
			case ("BTS"):
				$BTS++;
				break;
			case ("HHS"):
				$HHS++;
				break;
			case ("LIB"):
				$LIB++;
				break;
			case ("M&S"):
				$MS++;
				break;
			}
}
echo 'AHSS: ', $AHSS, '<br>';
echo 'BEIT: ', $BEIT, '<br>';
echo 'BTS: ', $BTS, '<br>';
echo 'HHS: ', $HHS, '<br>';
echo 'LIB: ', $LIB, '<br>';
echo 'M&S: ', $MS, '<br>';
$conn = NULL;
?>