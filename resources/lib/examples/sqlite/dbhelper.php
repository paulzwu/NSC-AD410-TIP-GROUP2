<?php
$conn = null;

openOrCreateDB();
createTable();
// insertFaculty and insertDepartment could be run in a loop as a readFile method extracts the data from a file
insertFaculty('1', 'John Doe', 'johndoe@email.com');
insertFaculty('2', 'Jane Doe', 'janedoe@email.com');
insertFaculty('3', 'Henry Doe', 'henrydoe@email.com');

insertDepartment("Math","Department of numbers and weird symbols");
insertDepartment("Science","Department of everything");
insertDepartment("English","Department of spelling and reading");
insertDepartment("Health","Department of scrubs");
insertDepartment("Beer","Department of all that is Holy");

outputData();
closeDB();

function openOrCreateDB(){
    global $conn;
    try {
        $conn = new PDO("sqlite:test.sqlite");
        echo "DB created successfully <br>";
    } catch (PDOException $e){
        echo 'Exception : '.$e->getMessage();
    }
}
function createTable(){
    global $conn;
    try {
        $sql = "CREATE TABLE IF NOT EXISTS Faculty (faculty_id INTEGER PRIMARY KEY, department_id INTEGER FOREIGN KEY, full_name TEXT, email TEXT)";
        $conn->exec($sql);

        $sql = "CREATE TABLE IF NOT EXISTS Departments (department_id INTEGER PRIMARY KEY, depart_name TEXT, description TEXT)";
        $conn->exec($sql);

        $sql = "CREATE TABLE IF NOT EXISTS Courses (course_id INTEGER PRIMARY KEY, department_id INTEGER FOREIGN KEY , course_name TEXT, description TEXT)";
        $conn->exec($sql);

        $sql = "CREATE TABLE IF NOT EXISTS Questions (question_id INTEGER PRIMARY KEY course_id INTEGER FOREIGN KEY, department_id INTEGER FOREIGN KEY, 
                question_name TEXT, description TEXT)";
        $conn->exec($sql);

        $sql = "CREATE TABLE IF NOT EXISTS Answers (answer_id INTEGER PRIMARY KEY, course_id INTEGER FOREIGN KEY, department_id INTEGER FOREIGN KEY, 
                answer_name TEXT, description TEXT)";
        $conn->exec($sql);

        $sql = "CREATE TABLE IF NOT EXISTS Results (course_id INTEGER FOREIGN KEY, department_id INTEGER FOREIGN KEY, course_name TEXT, description TEXT)";
        $conn->exec($sql);

        echo "Tables created successfully <br>";
    } catch (PDOException $e){
        echo 'Exception : '.$e->getMessage();
    }
}
function insertFaculty($depart_id,$name,$email){
    global $conn;
    try {
        // insert data
        $sql = "INSERT OR IGNORE INTO Faculty (department_id, full_name, email) 
                      VALUES ('$depart_id', '$name', '$email');";
        $conn->exec($sql);
        echo "Inserted data successfully <br>";
    }catch (PDOException $e){
        echo 'Exception : '.$e->getMessage();
    }
}
function insertDepartment($name,$description){
    global $conn;
    try {
        // insert data
        $sql = "INSERT OR IGNORE INTO Departments (depart_name, description) 
                      VALUES ('$name', '$description');";
        $conn->exec($sql);
        echo "Inserted data successfully <br>";
    } catch (PDOException $e) {
        echo 'Exception : ' . $e->getMessage();
    }
}
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
            print "<td>" . $row['description'] . "</td>";
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