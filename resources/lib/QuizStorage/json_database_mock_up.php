<?php
$conn = null;

openOrCreateDB();
createTable();
//Some data insert
insertUser('1');
insertUser('0');
insertUser('0');
insertQuiz('sample1: text');
insertQuiz('sample2: 12344?><');
insertQuiz('sample3: more text');
insertAnswers('answer answer {}', '1');
insertAnswers('generic response','1');
insertAnswers(' ', '0');
insertAnswers('answer', '0');
insertUserQuiz('2', '1');
insertUserQuiz('3', '1');
insertUserQuiz('3', '3');
insertUserAnswers('2', '2');
insertUserAnswers('3','1');
insertUserAnswers('2','1');

function openOrCreateDB(){
    global $conn;
    try {
        $conn = new PDO("sqlite:json_database_mock_up.sqlite");
        echo "DB created successfully <br>";
    } catch (PDOException $e){
        echo 'Exception : '.$e->getMessage();
    }
}

function createTable(){
    global $conn;
    try {
        $sql = "CREATE TABLE IF NOT EXISTS User (user_id INTEGER PRIMARY KEY, is_admin TINYINT)";
        $conn->exec($sql);
		//Code following not working. Will investigate.
        if ($conn->exec($sql)){
            insertUser('1');
            insertUser('0');
            insertUser('0');
            echo "User table created.";
        } else {
            echo "User table already exists.";
        }
		
		$sql = "CREATE TABLE IF NOT EXISTS Quiz (quiz_id INTEGER PRIMARY KEY, quiz_data TEXT)";
        $conn->exec($sql);
		//Code following not working. Will investigate.
        if ($conn->exec($sql)){
            insertQuiz('sample1: text');
            insertQuiz('sample2: 12344?><');
            echo "Quiz table created.";
        } else {
            echo "Quiz table already exists.";
        }
		
		$sql = "CREATE TABLE IF NOT EXISTS Answers (answer_id INTEGER PRIMARY KEY, answer_data TEXT, completion TINYINT)";
        $conn->exec($sql);
		//Code following not working. Will investigate.
        if ($conn->exec($sql)){
            insertAnswers('answer answer {}', '1');
            insertAnswers('generic response','1');
            insertAnswers(' ', '0');
            echo "Answers table created.";
        } else {
            echo "Answers table already exists.";
        }
		
		$sql = "CREATE TABLE IF NOT EXISTS UserQuiz (userquiz_id INTEGER PRIMARY KEY, user_id INTEGER, quiz_id INTEGER)";
        $conn->exec($sql);
		//Code following not working. Will investigate.
        if ($conn->exec($sql)){
            insertUserQuiz('1', '1');
            insertUserQuiz('1','2');
            insertUserQuiz('2', '2');
            echo "UserQuiz table created.";
        } else {
            echo "UserQuiz table already exists.";
        }
		
		$sql = "CREATE TABLE IF NOT EXISTS UserAnswers (useranswer_id INTEGER PRIMARY KEY, quiz_id INTEGER, answer_id INTEGER)";
        $conn->exec($sql);
		//Code following not working. Will investigate.
        if ($conn->exec($sql)){
            insertUserAnswers('1', '1');
            insertUserAnswers('1','1');
            insertUserAnswers('2', '3');
            echo "UserAnswers table created.";
        } else {
            echo "UserAnswers table already exists.";
        }
		
	}catch (PDOException $e){
        echo 'Exception : '.$e->getMessage();
    }	
}
// ------------------------------------INSERT METHODS---------------------------------------------//


function insertUser($is_admin){
    global $conn;
    try {
        // insert data
        $sql = "INSERT OR IGNORE INTO User (is_admin) 
                      VALUES ('$is_admin');";
        $conn->exec($sql);
        echo "Inserted User successfully <br>";
    }catch (PDOException $e){
        echo 'Exception : '.$e->getMessage();
    }
}

function insertQuiz($quiz_data){
    global $conn;
    try {
        // insert data
        $sql = "INSERT OR IGNORE INTO Quiz (quiz_data) 
                      VALUES ('$quiz_data');";
        $conn->exec($sql);
        echo "Inserted quiz data successfully <br>";
    } catch (PDOException $e) {
        echo 'Exception : ' . $e->getMessage();
    }
}

function insertAnswers($answer_data, $completion){
    global $conn;
    try {
        // insert data
        $sql = "INSERT OR IGNORE INTO Answers (answer_data, completion) 
                      VALUES ('$answer_data', '$completion');";
        $conn->exec($sql);
        echo "Inserted courses successfully <br>";
    }catch (PDOException $e){
        echo 'Exception : '.$e->getMessage();
    }
}

function insertUserQuiz ($user_id, $quiz_id){
    global $conn;
    try {
        // insert data
        $sql = "INSERT INTO UserQuiz (user_id, quiz_id) 
                      VALUES ('$user_id', '$quiz_id');";
        $conn->exec($sql);
        echo "Inserted UserQuiz successfully <br>";
    }catch (PDOException $e){
        echo 'Exception : '.$e->getMessage();
    }
}

function insertUserAnswers($quiz_id, $answer_id){
    global $conn;
    try {
        // insert data
        $sql = "INSERT INTO UserAnswers (quiz_id, answer_id) 
                      VALUES ('$quiz_id', '$answer_id');";
        $conn->exec($sql);
        echo "Inserted UserAnswers successfully <br>";
    }catch (PDOException $e){
        echo 'Exception : '.$e->getMessage();
    }
}	
