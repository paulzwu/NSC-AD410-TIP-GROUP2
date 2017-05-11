<?php
$conn = null;

//Test cases. Sorry no html. 
$use_id = 1;
$use_id2 = 2;
$use_id3 = 3;

$comp_check = 100;

openOrCreateDB();
$test = getCompletion($comp_check);
echo $test;
echo '</br>';
echo '</br>';
echo 'Test Case: User_ID = 1';
echo '</br>';
echo 'User is an admin. Has access to all quizzes.';
echo '</br>';
getUserQuizzes($use_id);
echo '</br>';
echo '</br>';
echo 'Test Case: User_ID = 2';
echo '</br>';
echo 'User is not an admin. Has access to one quiz (Quiz 1).';
echo '</br>';
getUserQuizzes($use_id2);
echo '</br>';
echo '</br>';
echo 'Test Case: User_ID = 3';
echo '</br>';
echo 'User is not an admin. Has access to two quizzes (Quiz 1 and 3).';
echo '</br>';
getUserQuizzes($use_id3);
echo '</br>';
echo '</br>';


//Establish a connection to the DB.
function openOrCreateDB(){
    global $conn;
    try {
        $conn = new PDO("sqlite:json_database_mock_up.sqlite");
        echo "Connected successfully <br>";
    } catch (PDOException $e){
        echo 'Exception : '.$e->getMessage();
    }
}

//Function to see if a quiz is complete. 
function getCompletion($quiz_id){
	global $conn;
    try {
		$sql = 
			   "SELECT Answers.completion
				FROM Answers
				LEFT JOIN UserAnswers ON UserAnswers.answer_id = Answers.answer_id
				LEFT JOIN Quiz ON Quiz.quiz_id = UserAnswers.quiz_id
				LEFT JOIN UserQuiz ON UserQuiz.quiz_id =Quiz.quiz_id
				LEFT JOIN User ON User.user_id = UserQuiz.quiz_id
				WHERE Quiz.quiz_id = '$quiz_id'
				GROUP BY Quiz.quiz_id";
		$result = $conn->query($sql);
		foreach($result as $row) {
			$newresult = $row['completion'];
		
		
		}
		return $newresult; 
    }
	catch (PDOException $e){
        echo 'Exception : '.$e->getMessage();
   
    }
}
	
	//Function to see:
	//	if a users is an admin
	//	what quizzes belong to them
	//	Whether or not those quizzes are complete. Loads them into an array.
	function getUserQuizzes($use_id){
	global $conn;
	$admin_check= 0;
	$user_id = 1;
    try {
		//First check if the user is an admin.
		$sql = 
			   "SELECT user_id, is_admin
				FROM User
				WHERE User.user_id = '$use_id' ";
		$result = $conn->query($sql);
		
		//Print their ID and check to see if they are an admin.
		foreach($result as $row) {
			$user_id = $row['user_id'];
			echo "ID:",$user_id, "<br>";
			$admin_check = $row['is_admin'];
		}
		
		//If they are an admin print message and show them all quizzes.
		if ($admin_check == 1){
			echo "You are an admin. <br> ";
			$sql = 
			   "SELECT quiz_id
				FROM Quiz";
			$result = $conn->query($sql);
			$complete = array();
			$incomplete = array();
			$comp = 0;
			$incomp = 0;
			$comp_check = 0;
			foreach($result as $row) {
				$quiz_id = $row['quiz_id'];
				$comp_check = getCompletion($quiz_id);
				if ($comp_check == 0){
					$incomplete[$incomp] = $quiz_id;
					$incomp++;
					echo 'Quiz ',$quiz_id, ': Incomplete </br>';
				}
				else{
					$complete[$comp] = $quiz_id;
					$comp++;
					echo 'Quiz ',$quiz_id, ': Complete </br>';
				}
			}
		}
		
		//If not, just print quizzes that belong to them.
		else{
			$sql = 
			   "SELECT Quiz.quiz_id
				FROM Quiz
				JOIN UserQuiz ON Quiz.quiz_id = UserQuiz.quiz_id
				JOIN User ON User.user_id = UserQuiz.user_id
				WHERE User.user_id = '$user_id' ";
			$complete = array();
			$incomplete = array();
			$comp = 0;
			$incomp = 0;
			$comp_check = 0;
			$result = $conn->query($sql);
			foreach($result as $row) {
				$quiz_id = $row['quiz_id'];
				$comp_check = getCompletion($quiz_id);
				if ($comp_check == 0){
					$incomplete[$incomp] = $quiz_id;
					$incomp++;
					echo 'Quiz ',$quiz_id, ': Incomplete </br>';
				}
				else{
					$complete[$comp] = $quiz_id;
					$comp++;
					echo 'Quiz ',$quiz_id, ': Complete </br>';
				}
				
			}	
		}
		}catch (PDOException $e){
        echo 'Exception : '.$e->getMessage();
    }	
	}

 ?>