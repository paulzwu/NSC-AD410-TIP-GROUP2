<?php
$conn = null;
/*
openOrCreateDB();
createTable();
outputData();
closeDB();
*/
function openOrCreateDB(){
    global $conn;
    try {
        $conn = new PDO("sqlite:test.sqlite");
    } catch (PDOException $e){
        echo 'Exception : '.$e->getMessage();
    }
}
function createTable(){
    global $conn;
    try {
        $sql = "CREATE TABLE IF NOT EXISTS Faculty (
                faculty_id INTEGER PRIMARY KEY, 
                department_id INTEGER, 
                full_name TEXT, 
                email TEXT)";
        $conn->exec($sql);
        if ($conn->exec($sql)){
            // method could be run in a loop as a readFile method extracts the data from a file
            insertFaculty('1', 'John Doe', 'johndoe@email.com');
            insertFaculty('2', 'Jane Doe', 'janedoe@email.com');
            insertFaculty('3', 'Henry Doe', 'henrydoe@email.com');
            echo "Faculty table created.";
        } else {
            echo "Faculty table already exists.";
        }

        $sql = "CREATE TABLE IF NOT EXISTS Departments (
                department_id INTEGER PRIMARY KEY, 
                depart_name TEXT, 
                depart_description TEXT)";
        $conn->exec($sql);
        if ($conn->exec($sql)){
            insertDepartment("Math","Department of numbers and weird symbols");
            insertDepartment("Science","Department of everything");
            insertDepartment("English","Department of spelling and reading");
            insertDepartment("Health","Department of scrubs");
            insertDepartment("Beer","Department of all that is Holy");
            echo "Departments table created.";
        } else {
            echo "Departments table already exists.";
        }

        $sql = "CREATE TABLE IF NOT EXISTS Courses (
                course_id INTEGER PRIMARY KEY, 
                department_id INTEGER, 
                course_name TEXT, 
                course_description TEXT)";
        $conn->exec($sql);
        if ($conn->exec($sql)){
            insertCourses('1','AD410','Web Application Practicum');
            insertCourses('1','AD340','Mobile Application');
            insertCourses('2','AD900','I Want Out Of Here');
            echo "Courses table created.";
        } else {
            echo "Courses table already exists.";
        }

        $sql = "CREATE TABLE IF NOT EXISTS Questions (
                question_id INTEGER PRIMARY KEY, 
                course_id INTEGER, 
                department_id INTEGER, 
                question_name TEXT, 
                question_description TEXT)";
        $conn->exec($sql);
        if ($conn->exec($sql)){
            insertQuestions("1","0","TIP question","What is your division");
            insertQuestions("1","0","TIP question","Course Prefix");
            insertQuestions("1","0","TIP question","Course number");
            insertQuestions("1","0","TIP question","Quarter year");
            insertQuestions("1","0","TIP question","If this is a group TIP, please list all faculty participating. Thank you");
            insertQuestions("1","0","TIP question","What is the problem or lesson that you identified and will be discussing in 
                                                this TIP? No topic is too big or too small. All are welcomed!");
            insertQuestions("1","0","TIP question","What is the course-level objective that this TIP best addresses");
            insertQuestions("1","0","TIP question","Which of the college-wide Essential Learning Outcomes does your TIP most 
                                             closely address");
            insertQuestions("1","0","TIP question","Which of the following best describes the evidence you found for the problem");
            insertQuestions("1","0","TIP question","Please describe more specifcally how you identified the problem");
            insertQuestions("1","0","TIP question","Please select the change that best fits what you did to try to address the problem");
            insertQuestions("1","0","TIP question","Specifically, what did you do to address the problem");
            insertQuestions("1","0","TIP question","Please select the evidence that best fits how you assessed the impact of 
                                             the change you made");
            insertQuestions("1","0","TIP question","Please describe more fully how you assessed the impact of the change you made");
            insertQuestions("1","0","TIP question","What new opportunities did you consider as a result of identifying this 
                                             problem and making this change");
            insertQuestions("1","0","TIP question","What else would you like to share about the teaching improvement process 
                                             you engaged in this quarter");
            insertQuestions("1","0","TIP question","TIP data will be shared de-identified and in aggregate. TIPs are NOT an 
                                             evaluation of your teaching. It is useful to campus-wide assessment and 
                                             professional development to use specifics of individual TIPs");
            insertQuestions("1","0","TIP question","Thank you for your TIP! The Canvas system automatically saves information 
                                             as you fill out this form. You may return to it at any time before choosing Submit.
                                             If you are not yet done, simply log out of Canvas or shut down your browser. 
                                             Your information will be saved.
                                             DO NOT CHOOSE SUBMIT until you have completed your TIP.");
            echo "Questions table created.";
        } else {
            echo "Questions table already exists.";
        }

        $sql = "CREATE TABLE IF NOT EXISTS Answers (
                answer_id INTEGER PRIMARY KEY, 
                course_id INTEGER, 
                department_id INTEGER, 
                answer_name TEXT, 
                answer_description TEXT)";
        $conn->exec($sql);
        if ($conn->exec($sql)){
            insertAnswers("1","0","Personal answer","I have no idea");
            insertAnswers("2","1","Personal answer","Im a crazy person");
            insertAnswers("3","2","Personal answer","Im you");
            echo "Answers table created.";
        } else {
            echo "Answers table already exists.";
        }

        $sql = "CREATE TABLE IF NOT EXISTS Results (
                result_id INTEGER PRIMARY KEY, 
                question_id INTEGER, 
                answer_id INTEGER, 
                result_description TEXT)";
        $conn->exec($sql);
        if ($conn->exec($sql)){

            echo "Results table created.";
        } else {
            echo "Results table already exists.";
        }

        echo "Tables created successfully <br>";
    } catch (PDOException $e){
        echo 'Exception : '.$e->getMessage();
    }
}

// ------------------------------------INSERT METHODS---------------------------------------------//


function insertFaculty($depart_id,$name,$email){
    global $conn;
    try {
        // insert data
        $sql = "INSERT OR IGNORE INTO Faculty (department_id, full_name, email) 
                      VALUES ('$depart_id', '$name', '$email');";
        $conn->exec($sql);
        echo "Inserted faculty successfully <br>";
    }catch (PDOException $e){
        echo 'Exception : '.$e->getMessage();
    }
}

function insertDepartment($name,$description){
    global $conn;
    try {
        // insert data
        $sql = "INSERT OR IGNORE INTO Departments (depart_name, depart_description) 
                      VALUES ('$name', '$description');";
        $conn->exec($sql);
        echo "Inserted department successfully <br>";
    } catch (PDOException $e) {
        echo 'Exception : ' . $e->getMessage();
    }
}

function insertCourses($depart_id,$course_name,$course_descrip){
    global $conn;
    try {
        // insert data
        $sql = "INSERT OR IGNORE INTO Courses (department_id, course_name, course_description) 
                      VALUES ('$depart_id','$course_name','$course_descrip');";
        $conn->exec($sql);
        echo "Inserted course successfully <br>";
    }catch (PDOException $e){
        echo 'Exception : '.$e->getMessage();
    }
}

function insertQuestions($course_id, $department_id, $question_name, $question_descrip){
    global $conn;
    try {
        // insert data
        $sql = "INSERT INTO Questions (course_id, department_id, question_name, question_description) 
                      VALUES ('$course_id', '$department_id','$question_name','$question_descrip');";
        $conn->exec($sql);
        echo "Inserted question successfully <br>";
    }catch (PDOException $e){
        echo 'Exception : '.$e->getMessage();
    }
}

function insertAnswers($course_id, $department_id, $answer_name, $answer_descrip){
    global $conn;
    try {
        // insert data
        $sql = "INSERT INTO Answers (course_id, department_id, answer_name, answer_description) 
                      VALUES ('$course_id','$department_id','$answer_name','$answer_descrip');";
        $conn->exec($sql);
        echo "Inserted answer successfully <br>";
    }catch (PDOException $e){
        echo 'Exception : '.$e->getMessage();
    }
}

// Needs modifying to
function insertResults($depart_id,$course_name,$result_descrip){
    global $conn;
    try {
        // insert data
        $sql = "INSERT OR IGNORE INTO Results (department_id, course_name, result_description) 
                      VALUES ('$depart_id','$course_name','$result_descrip');";
        $conn->exec($sql);
        echo "Inserted result successfully <br>";
    }catch (PDOException $e){
        echo 'Exception : '.$e->getMessage();
    }
}

// -------------------------UPDATE METHODS------------------------------------//

function updateFaculty($faculty_id,$depart_id,$name,$email,$new_depart_id,$new_name,$new_email){
    global $conn;
    try {
		//Update single record
        if ($new_depart_id == '' && $new_name == ''){
			$sql = "UPDATE OR IGNORE Faculty
			SET email = '$new_email'
			WHERE faculty_id = '$faculty_id;";
			$conn->exec($sql);
		}
		else if ($new_depart_id == '' && $new_email == ''){
			$sql = "UPDATE OR IGNORE Faculty
			SET name = '$new_name'
			WHERE faculty_id = '$faculty_id;";
			$conn->exec($sql);
		}
		else if ($new_name == '' && $new_email == ''){
			$sql = "UPDATE OR IGNORE Faculty
			SET department_id = '$new_depart_id'
			WHERE faculty_id = '$faculty_id;";
			$conn->exec($sql);
		}
		//Multiple record updates
		else if ($new_depart_id == ''){
			$sql = "UPDATE OR IGNORE Faculty
			SET name = '$new_name', email = $new_email
			WHERE faculty_id = '$faculty_id;";
			$conn->exec($sql);
		}
		else if ($new_name == ''){
			$sql = "UPDATE OR IGNORE Faculty
			SET department_id = '$new_depart_id', email = $new_email
			WHERE faculty_id = '$faculty_id';";
			$conn->exec($sql);
		}
		else if ($new_email == ''){
			$sql = "UPDATE OR IGNORE Faculty
			SET department_id = '$new_depart_id', name = '$new_name'
			WHERE faculty_id = '$faculty_id';";
			$conn->exec($sql);
		}
		//All record update
		else{
			$sql = "UPDATE OR IGNORE Faculty
			SET department_id = '$new_depart_id', name = '$new_name', email = '$new_email'
			WHERE faculty_id = '$faculty_id'";
			$conn->exec($sql);
		}
        echo "Deleted data successfully <br>";
    }catch (PDOException $e){
        echo 'Exception : '.$e->getMessage();
    }
}

//separated the two updates into two functions for now. We can combine them later.

function updateDepartName($name,$new_name){
    global $conn;
    try {
        // update data name
        $sql = "UPDATE OR IGNORE Departments 
				SET depart_name = '$new_name'
				WHERE depart_name = '$name';";
        $conn->exec($sql);
        echo "Updated data successfully <br>";
    } catch (PDOException $e) {
        echo 'Exception : ' . $e->getMessage();
    }
}

function updateDepartDescription($new_description,$description){
    global $conn;
    try {
        // update data description
        $sql = "UPDATE OR IGNORE Departments 
				SET depart_description = '$new_description'
				WHERE depart_description = '$description';";
        $conn->exec($sql);
        echo "Updated data successfully <br>";
    } catch (PDOException $e) {
        echo 'Exception : ' . $e->getMessage();
    }
}

function updateCourses($course_id, $new_depart_id, $new_course_name, $new_course_descrip){
    global $conn;
    try {
        //Update single record
        if ($new_depart_id == '' && $new_course_name == ''){
            $sql = "UPDATE OR IGNORE Courses
			SET course_description = '$new_course_descrip'
			WHERE course_id = '$course_id;";
            $conn->exec($sql);
        }
        else if ($new_depart_id == '' && $new_course_descrip == ''){
            $sql = "UPDATE OR IGNORE Courses
			SET course_name = '$new_course_name'
			WHERE course_id = '$course_id;";
            $conn->exec($sql);
        }
        else if ($new_course_name == '' && $new_course_descrip == ''){
            $sql = "UPDATE OR IGNORE Courses
			SET department_id = '$new_depart_id'
			WHERE course_id = '$course_id;";
            $conn->exec($sql);
        }
        //Mutiple record updates
        else if ($new_depart_id == ''){
            $sql = "UPDATE OR IGNORE Courses
			SET course_name = '$new_course_name', description = $new_course_descrip
			WHERE course_id = '$course_id;";
            $conn->exec($sql);
        }
        else if ($new_course_name == ''){
            $sql = "UPDATE OR IGNORE Courses
			SET department_id = '$new_depart_id', description = $new_course_descrip
			WHERE course_id = '$course_id';";
            $conn->exec($sql);
        }
        else if ($new_course_descrip == ''){
            $sql = "UPDATE OR IGNORE Courses
			SET department_id = '$new_depart_id', course_name = '$new_course_name'
			WHERE course_id = '$course_id';";
            $conn->exec($sql);
        }
        //All record update
        else{
            $sql = "UPDATE OR IGNORE Courses
			SET department_id = '$new_depart_id', course_name = '$new_course_name', description = '$new_course_descrip'
			WHERE course_id = '$course_id'";
            $conn->exec($sql);
        }
        echo "Updated data successfully <br>";
    }catch (PDOException $e){
        echo 'Exception : '.$e->getMessage();
    }
}

function updateQuestions($question_id, $new_course_id, $new_depart_id, $new_question_name, $new_question_descrip){
    global $conn;
    try {
        //One record update
        if ($new_course_id == '' && $new_depart_id == '' && $new_question_name == ''){
            $sql = "UPDATE OR IGNORE Questions
			SET question_description = $new_question_descrip
			WHERE question_id = '$question_id;";
            $conn->exec($sql);
        }
        else if ($new_course_id == '' && $new_depart_id == '' && $new_question_descrip == ''){
            $sql = "UPDATE OR IGNORE Questions
			SET question_name = $new_question_name
			WHERE question_id = '$question_id;";
            $conn->exec($sql);
        }
        else if ($new_course_id == '' && $new_question_descrip == '' && $new_question_name == ''){
            $sql = "UPDATE OR IGNORE Questions
			SET department_id = $new_depart_id
			WHERE question_id = '$question_id;";
            $conn->exec($sql);
        }
        else if ($new_question_descrip == '' && $new_depart_id == '' && $new_question_name == ''){
            $sql = "UPDATE OR IGNORE Questions
			SET course_id = $new_course_id
			WHERE question_id = '$question_id;";
            $conn->exec($sql);
        }
        //Update two records
        else if ($new_depart_id == '' && $new_question_name == ''){
            $sql = "UPDATE OR IGNORE Questions
			SET question_description = '$new_question_descrip', course_id = $new_course_id
			WHERE question_id = '$question_id;";
            $conn->exec($sql);
        }
        else if ($new_depart_id == '' && $new_course_id == ''){
            $sql = "UPDATE OR IGNORE Questions
			SET question_description = '$new_question_descrip', question_name = $new_question_name
			WHERE question_id = '$question_id;";
            $conn->exec($sql);
        }
        else if ($new_depart_id == '' && $new_question_descrip == ''){
            $sql = "UPDATE OR IGNORE Questions
			SET question_name = '$new_question_name', course_id = $new_course_id 
			WHERE question_id = '$question_id;";
            $conn->exec($sql);
        }
        else if ($new_course_id == '' && $new_question_descrip == ''){
            $sql = "UPDATE OR IGNORE Questions
			SET question_name = '$new_question_name', department_id = $new_depart_id 
			WHERE question_id = '$question_id;";
            $conn->exec($sql);
        }
        else if ($new_course_id == '' && $new_question_name == ''){
            $sql = "UPDATE OR IGNORE Questions
			SET question_description = '$new_question_descrip', department_id = $new_depart_id 
			WHERE question_id = '$question_id;";
            $conn->exec($sql);
        }
        else if ($new_question_name == '' && $new_question_descrip == ''){
            $sql = "UPDATE OR IGNORE Questions
			SET department_id = '$new_depart_id', course_id = '$new_course_id'
			WHERE question_id = '$question_id;";
            $conn->exec($sql);
        }
        //Three record updates
        else if ($new_depart_id == ''){
            $sql = "UPDATE OR IGNORE Questions
			SET question_name = '$new_question_name', description = '$new_question_descrip', course_id = '$new_course_id'
			WHERE question_id = '$question_id;";
            $conn->exec($sql);
        }
        else if ($new_course_id == ''){
            $sql = "UPDATE OR IGNORE Questions
			SET question_name = '$new_question_name', description = '$new_question_descrip', department_id = '$new_depart_id'
			WHERE question_id = '$question_id;";
            $conn->exec($sql);
        }
        else if ($new_question_name == ''){
            $sql = "UPDATE OR IGNORE Questions
			SET department_id = '$new_depart_id', description = '$new_question_descrip', course_id = '$new_course_id'
			WHERE question_id = '$question_id';";
            $conn->exec($sql);
        }
        else if ($new_question_descrip == ''){
            $sql = "UPDATE OR IGNORE Questions
			SET department_id = '$new_depart_id', question_name = '$new_question_name', course_id = '$new_course_id'
			WHERE question_id = '$question_id';";
            $conn->exec($sql);
        }
        //All record update
        else{
            $sql = "UPDATE OR IGNORE Questions
			SET department_id = '$new_depart_id', question_name = '$new_question_name', description = '$new_question_descrip', course_id = $new_course_id
			WHERE question_id = '$question_id'";
            $conn->exec($sql);
        }
        echo "Updated data successfully <br>";
    }catch (PDOException $e){
        echo 'Exception : '.$e->getMessage();
    }
}

function updatAnswers($answer_id, $new_course_id, $new_depart_id, $new_answer_name, $new_answer_descrip){
    global $conn;
    try {
        //One record update
        if ($new_course_id == '' && $new_depart_id == '' && $new_answer_name == ''){
            $sql = "UPDATE OR IGNORE Answers
			SET answer_description = $new_answer_descrip
			WHERE answer_id = '$answer_id;";
            $conn->exec($sql);
        }
        else if ($new_course_id == '' && $new_depart_id == '' && $new_answer_descrip == ''){
            $sql = "UPDATE OR IGNORE Answers
			SET answer_name = $new_answer_name
			WHERE answer_id = '$answer_id;";
            $conn->exec($sql);
        }
        else if ($new_course_id == '' && $new_answer_descrip == '' && $new_answer_name == ''){
            $sql = "UPDATE OR IGNORE Answers
			SET department_id = $new_depart_id
			WHERE answer_id = '$answer_id;";
            $conn->exec($sql);
        }
        else if ($new_answer_descrip == '' && $new_depart_id == '' && $new_answer_name == ''){
            $sql = "UPDATE OR IGNORE Answers
			SET course_id = $new_course_id
			WHERE answer_id = '$answer_id;";
            $conn->exec($sql);
        }
        //Update two records
        else if ($new_depart_id == '' && $new_answer_name == ''){
            $sql = "UPDATE OR IGNORE Answers
			SET answer_description = '$new_answer_descrip', course_id = $new_course_id
			WHERE answer_id = '$answer_id;";
            $conn->exec($sql);
        }
        else if ($new_depart_id == '' && $new_course_id == ''){
            $sql = "UPDATE OR IGNORE Answers
			SET answer_description = '$new_answer_descrip', answer_name = $new_answer_name
			WHERE answer_id = '$answer_id;";
            $conn->exec($sql);
        }
        else if ($new_depart_id == '' && $new_answer_descrip == ''){
            $sql = "UPDATE OR IGNORE Answers
			SET answer_name = '$new_answer_name', course_id = $new_course_id 
			WHERE answer_id = '$answer_id;";
            $conn->exec($sql);
        }
        else if ($new_course_id == '' && $new_answer_descrip == ''){
            $sql = "UPDATE OR IGNORE Answers
			SET answer_name = '$new_answer_name', department_id = $new_depart_id 
			WHERE answer_id = '$answer_id;";
            $conn->exec($sql);
        }
        else if ($new_course_id == '' && $new_answer_name == ''){
            $sql = "UPDATE OR IGNORE Answers
			SET answer_description = '$new_answer_descrip', department_id = $new_depart_id 
			WHERE answer_id = '$answer_id;";
            $conn->exec($sql);
        }
        else if ($new_answer_name == '' && $new_answer_descrip == ''){
            $sql = "UPDATE OR IGNORE Answers
			SET department_id = '$new_depart_id', course_id = '$new_course_id'
			WHERE answer_id = '$answer_id;";
            $conn->exec($sql);
        }
        //Three record updates
        else if ($new_depart_id == ''){
            $sql = "UPDATE OR IGNORE Answers
			SET answer_name = '$new_answer_name', description = '$new_answer_descrip', course_id = '$new_course_id'
			WHERE answer_id = '$answer_id;";
            $conn->exec($sql);
        }
        else if ($new_course_id == ''){
            $sql = "UPDATE OR IGNORE Answers
			SET answer_name = '$new_answer_name', description = '$new_answer_descrip', department_id = '$new_depart_id'
			WHERE answer_id = '$answer_id;";
            $conn->exec($sql);
        }
        else if ($new_answer_name == ''){
            $sql = "UPDATE OR IGNORE Answers
			SET department_id = '$new_depart_id', description = '$new_answer_descrip', course_id = '$new_course_id'
			WHERE answer_id = '$answer_id';";
            $conn->exec($sql);
        }
        else if ($new_answer_descrip == ''){
            $sql = "UPDATE OR IGNORE Answers
			SET department_id = '$new_depart_id', answer_name = '$new_answer_name', course_id = '$new_course_id'
			WHERE answer_id = '$answer_id';";
            $conn->exec($sql);
        }
        //All record update
        else{
            $sql = "UPDATE OR IGNORE Answers
			SET department_id = '$new_depart_id', answer_name = '$new_answer_name', description = '$new_answer_descrip', course_id = $new_course_id
			WHERE answer_id = '$answer_id'";
            $conn->exec($sql);
        }
        echo "Updated data successfully <br>";
    }catch (PDOException $e){
        echo 'Exception : '.$e->getMessage();
    }
}

function updateResults($course_id, $new_depart_id, $new_course_name, $new_result_descrip){
    global $conn;
    try {
        //Update single record
        if ($new_depart_id == '' && $new_course_name == ''){
            $sql = "UPDATE OR IGNORE Results
			SET result_description = '$new_result_descrip'
			WHERE course_id = '$course_id;";
            $conn->exec($sql);
        }
        else if ($new_depart_id == '' && $new_result_descrip == ''){
            $sql = "UPDATE OR IGNORE Results
			SET course_name = '$new_course_name'
			WHERE course_id = '$course_id;";
            $conn->exec($sql);
        }
        else if ($new_course_name == '' && $new_result_descrip == ''){
            $sql = "UPDATE OR IGNORE Results
			SET department_id = '$new_depart_id'
			WHERE course_id = '$course_id;";
            $conn->exec($sql);
        }
        //Mutiple record updates
        else if ($new_depart_id == ''){
            $sql = "UPDATE OR IGNORE Results
			SET course_name = '$new_course_name', result_description = $new_result_descrip
			WHERE course_id = '$course_id;";
            $conn->exec($sql);
        }
        else if ($new_course_name == ''){
            $sql = "UPDATE OR IGNORE Results
			SET department_id = '$new_depart_id', result_description = $new_result_descrip
			WHERE course_id = '$course_id';";
            $conn->exec($sql);
        }
        else if ($new_result_descrip == ''){
            $sql = "UPDATE OR IGNORE Results
			SET department_id = '$new_depart_id', course_name = '$new_course_name'
			WHERE course_id = '$course_id';";
            $conn->exec($sql);
        }
        //All record update
        else{
            $sql = "UPDATE OR IGNORE Results
			SET department_id = '$new_depart_id', course_name = '$new_course_name', result_description = '$new_result_descrip'
			WHERE course_id = '$course_id'";
            $conn->exec($sql);
        }
        echo "Updated data successfully <br>";
    }catch (PDOException $e){
        echo 'Exception : '.$e->getMessage();
    }
}

// ----------------------------------DELETE METHODS----------------------------------//
//Delete needs to be careful of children
function deleteFaculty($faculty_id){
    global $conn;
    try {
        // insert data
        $sql = "DELETE OR IGNORE FROM Faculty
				WHERE faculty_id = '$faculty_id';";
        $conn->exec($sql);
        echo "Deleted data successfully <br>";
    }catch (PDOException $e){
        echo 'Exception : '.$e->getMessage();
    }
}

function deleteDepartment($depart_id){
    global $conn;
    try {
        // update data description
        $sql = "DELETE OR IGNORE FROM Departments 
				WHERE department_id = '$depart_id';";
        $conn->exec($sql);
        echo "Deleted data successfully <br>";
    } catch (PDOException $e) {
        echo 'Exception : ' . $e->getMessage();
    }
}

//Delete needs to be careful of children
function deleteCourses($course_id){
    global $conn;
    try {
        // insert data
        $sql = "DELETE OR IGNORE FROM Cources
				WHERE course_id = '$course_id';";
        $conn->exec($sql);
        echo "Deleted data successfully <br>";
    }catch (PDOException $e){
        echo 'Exception : '.$e->getMessage();
    }
}

//Delete needs to be careful of children
function deleteQuestions($question_id){
    global $conn;
    try {
        // insert data
        $sql = "DELETE OR IGNORE FROM Questions
				WHERE question_id = '$question_id';";
        $conn->exec($sql);
        echo "Deleted data successfully <br>";
    }catch (PDOException $e){
        echo 'Exception : '.$e->getMessage();
    }
}

//Delete needs to be careful of children
function deleteAnswers($answer_id){
    global $conn;
    try {
        // insert data
        $sql = "DELETE OR IGNORE FROM Answers
				WHERE answer_id = '$answer_id';";
        $conn->exec($sql);
        echo "Deleted data successfully <br>";
    }catch (PDOException $e){
        echo 'Exception : '.$e->getMessage();
    }
}

//Delete needs to be careful of children
function deleteResults($course_id){
    global $conn;
    try {
        // insert data
        $sql = "DELETE OR IGNORE FROM Cources
				WHERE course_id = '$course_id';";
        $conn->exec($sql);
        echo "Deleted data successfully <br>";
    }catch (PDOException $e){
        echo 'Exception : '.$e->getMessage();
    }
}

//		***RESULTS END***

function outputData(){
    global $conn;
    try {
        // queries database file for information
        $result = $conn->query('SELECT * FROM Departments');
        // formatting statements
        print "<style>table, th, td {border: 1px solid black; border-collapse: collapse; padding: 12px;
		text-align: center;}</style>";
        print "<table><br><tr><th>Id</th><th>Name</th><th>Description</th></tr>";
        // pulls results from returned data
        foreach ($result as $row) {
            // prints formatted data
            print "<tr><td>" . $row['department_id'] . "</td>";
            print "<td>" . $row['depart_name'] . "</td>";
            print "<td>" . $row['depart_description'] . "</td>";
            print "<td></td></tr>";
            $result = $conn->query('SELECT * FROM Colors');
        }
    } catch (PDOException $e) {
        print 'Exception : ' . $e->getMessage();
    }
}
function closeDB(){
    global $conn;
    // closes db
    $conn = NULL;
}
?>
