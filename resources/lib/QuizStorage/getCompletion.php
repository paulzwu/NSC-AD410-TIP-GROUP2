<html lang="en">
<p>UserIDs can either be 2 or 3.</p>
<p>SurveyIDs can be 1,2, or 3.</p>
<form action="getCompletion.php" method="post">
<input type="text" placeholder="Enter a UserID" name="user_id" required>
<input type="text" placeholder="Enter a SurveyID" name="survey_id" required>
<input type = "submit" name = "input" value = "input">
</form>
</html>

<?php
//initialize question num:
$num = 1;
$questionNum = 'question' . $num;
$completion = 1;
//get variables
if (isset ($_POST['input'])){
	$user_id = filter_input(INPUT_POST, 'user_id');
	$survey_id = filter_input(INPUT_POST,'survey_id');

	//connect to db
	try {
		$conn = new PDO("sqlite:database_v_3.sqlite");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
		echo "Can't connet to DB: ".$e->getMessage();
		}
		
	//sql statement
	$sql = "SELECT answer_data FROM Answers
			JOIN UserSurvey ON Answers.answer_id = UserSurvey.answer_id
			WHERE UserSurvey.survey_id = '$survey_id' AND UserSurvey.user_id = '$user_id';";

	//query
	$result = $conn->query($sql);
	if (empty($results)) { 
		echo 'Survey not found'; 
	} 
	else {
		foreach($result as $row) {
					$num = 1;
					$questionNum = 'question' . $num;
					$answer_data = $row['answer_data'];
					$json = $answer_data;
					$answers = json_decode($json);
					while( $num <= 17) {
						$complete = $answers->{$questionNum};
						if (!isset($complete)){
							$completion = 0;
							break;
							
						}
						else {
							$num++;
							$questionNum = 'question' . $num;
						}
					}
					if ($completion == 0){
						echo 'Survey is incomplete';
							echo '<br>';
					}
					else{
						echo 'Survey is complete';
					}
						
		}
	}
}
$conn = NULL;
?>