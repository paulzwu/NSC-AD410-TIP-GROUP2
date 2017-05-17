<?php
$conn = null;

//Test cases. Sorry no html.
$use_id = 1;
$use_id2 = 2;
$use_id3 = 3;

$comp_check = 100;

openOrCreateDB();
echo '</br>';
echo 'Test Case: User_ID = 1';
echo '</br>';
echo 'User is an admin. Has access to all quizzes.';
echo '</br>';
isAdmin($use_id);
echo '</br>';
echo '</br>';
echo 'Test Case: User_ID = 2';
echo '</br>';
echo 'User is not an admin. Has access to Quiz 1 and 2.';
echo '</br>';
isAdmin($use_id2);
echo '</br>';
echo '</br>';
echo 'Test Case: User_ID = 3';
echo '</br>';
echo 'User is not an admin. Has access to Quiz 1, 2, and 3.';
echo '</br>';
isAdmin($use_id3);
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

function isAdmin($use_id){
	global $conn;
	$admin_check = 0;
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
			getAdminQuizzes($user_id);
		}
		else {
			echo "You are not an admin. <br> ";
			getUserQuizzes($user_id);
		}
	}catch (PDOException $e){
		echo 'Exception : '.$e->getMessage();
		
	}
}

function getAdminQuizzes($user_id){
	global $conn;
	try {
		//If they are an admin print message and show them all quizzes.
		$sql =
			"SELECT user_id
			FROM User
			WHERE user_id !='$user_id'";
		$result = $conn->query($sql);
		foreach($result as $row) {
			$user_id = $row['user_id'];
			echo 'User: ', $user_id, '<br>';
			getUserQuizzes($user_id);
		}
	}catch (PDOException $e){
		echo 'Exception : '.$e->getMessage();
		
	}
}



//Function to see if a quiz is complete.
function getCompletion($quiz_id,$use_id){
	global $conn;
	try {
		$sql =
			"SELECT Answers.completion
			FROM Answers
			JOIN UserQuiz ON UserQuiz.answer_id = Answers.answer_id
			WHERE UserQuiz.quiz_id = '$quiz_id' AND UserQuiz.user_id = '$use_id'";
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

function getUserQuizzes($use_id){
	global $conn;
	try {
		$user_id = $use_id;
		$sql =
			"SELECT UserQuiz.quiz_id
			FROM UserQuiz
			WHERE UserQuiz.user_id = '$user_id' ";
		$quizCompArray = array();
		$comp_check = 0;
		$result = $conn->query($sql);
		$i = 0;
		foreach($result as $row) {
			$quiz_id = $row['quiz_id'];
			$comp_check = getCompletion($quiz_id,$use_id);
			$quizCompArray[$i][] = $quiz_id;
			$quizCompArray[$i][] = $comp_check;
			echo 'Quiz ', $quizCompArray[$i][0], ':';
			if ($quizCompArray[$i][1] == 0){
				echo 'Incomplete </br>';
			}
			else {
				echo 'Complete </br>';
			}
			$i++;
		}
	}
	catch (PDOException $e){
		echo 'Exception : '.$e->getMessage();
	}
}

?>