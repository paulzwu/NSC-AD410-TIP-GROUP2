<?php
$conn = null;

openOrCreateDB();
createTable();

function openOrCreateDB(){
    global $conn;
    try {
        $conn = new PDO("sqlite:database_v_2.sqlite");
        echo "DB created successfully <br>";
    } catch (PDOException $e){
        echo 'Exception : '.$e->getMessage();
    }
}

function createTable(){
    global $conn;
    try {
        $sql = "CREATE TABLE IF NOT EXISTS User (user_id INTEGER PRIMARY KEY, user_name TEXT, is_admin TINYINT)";
        $conn->exec($sql);
        if ($conn->exec($sql)){
            echo "User table created.";
        } else {
            echo "User table already exists.";
        }
		
		$sql = "CREATE TABLE IF NOT EXISTS Survey (survey_id INTEGER PRIMARY KEY, survey_name TEXT, course TEXT, survey_data TEXT, year NUMERIC)";
        $conn->exec($sql);
        if ($conn->exec($sql)){
            echo "Survey table created.";
        } else {
            echo "Survey table already exists.";
        }
		
		$sql = "CREATE TABLE IF NOT EXISTS Answers (answer_id INTEGER PRIMARY KEY, answer_data TEXT, completion TINYINT)";
        $conn->exec($sql);
        if ($conn->exec($sql)){
            echo "Answers table created.";
        } else {
            echo "Answers table already exists.";
        }
		
		$sql = "CREATE TABLE IF NOT EXISTS UserSurvey (user_survey_id INTEGER PRIMARY KEY, user_id INTEGER, user_name TEXT, survey_name TEXT, 
				survey_id INTEGER, answer_id)";
        $conn->exec($sql);
        if ($conn->exec($sql)){
            echo "UserQuiz table created.";
        } else {
            echo "UserQuiz table already exists.";
        }
		
	}catch (PDOException $e){
        echo 'Exception : '.$e->getMessage();
    }	
}
// ------------------------------------INSERT METHODS---------------------------------------------//


function insertUser($name, $is_admin){
    global $conn;
    try {
        // insert data
        $sql = "INSERT OR IGNORE INTO User (user_name, is_admin) 
                      VALUES ('$user_name','$is_admin');";
        $conn->exec($sql);
        echo "Inserted User successfully <br>";
    }catch (PDOException $e){
        echo 'Exception : '.$e->getMessage();
    }
}

function insertSurvey($survey_name, $course, $survey_data, $year){
    global $conn;
    try {
        // insert data
        $sql = "INSERT OR IGNORE INTO Survey (survey_name, course, survey_data, year) 
                      VALUES ('$survey_name', '$course', '$survey_data', '$year');";
        $conn->exec($sql);
        echo "Inserted survey data successfully <br>";
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
        echo "Inserted Answers successfully <br>";
    }catch (PDOException $e){
        echo 'Exception : '.$e->getMessage();
    }
}

function insertUserSurvey ($user_id, $user_name, $survey_name, $survey_id, $answer_id){
    global $conn;
    try {
        // insert data
        $sql = "INSERT INTO UserSurvey (user_id, user_name, survey_name, survey_id, answer_id) 
                      VALUES ('$user_id', '$user_name', '$survey_name', '$survey_id', '$answer_id');";
        $conn->exec($sql);
        echo "Inserted UserSurvey successfully <br>";
    }catch (PDOException $e){
        echo 'Exception : '.$e->getMessage();
    }
}
	
