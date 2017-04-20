<?php
$conn = null;
// script to create a sample database
/*try {
    // open the database - creates the db if file not present
    $conn = new PDO("sqlite:test.sqlite");
    // create the table(s) within the db file
    $conn->exec("CREATE TABLE Colors (Id INTEGER PRIMARY KEY, Name TEXT, Rgb TEXT, Hex TEXT)");
    // insert data
    $conn->exec("INSERT INTO Colors (Name, Rgb, Hex) VALUES ('Red', '255,0,0', '#ff0000');".
        "INSERT INTO Colors (Name, Rgb, Hex) VALUES ('Lime', '0,255,0', '#00ff00');".
        "INSERT INTO Colors (Name, Rgb, Hex) VALUES ('Blue', '0,0,255', '#0000ff');".
        "INSERT INTO Colors (Name, Rgb, Hex) VALUES ('Yellow', '255,255,0', '#ffff00');".
        "INSERT INTO Colors (Name, Rgb, Hex) VALUES ('Aqua', '0,255,255', '#00ffff');".
        "INSERT INTO Colors (Name, Rgb, Hex) VALUES ('Fuchsia', '255,0,255', '#ff00ff');".
        "INSERT INTO Colors (Name, Rgb, Hex) VALUES ('Olive', '128,128,0', '#808000');".
        "INSERT INTO Colors (Name, Rgb, Hex) VALUES ('Teal', '0,128,128', '#008080');".
        "INSERT INTO Colors (Name, Rgb, Hex) VALUES ('Purple', '128,0,128', '#800080');".
        "INSERT INTO Colors (Name, Rgb, Hex) VALUES ('White', '255,255,255', '#ffffff');".
        "INSERT INTO Colors (Name, Rgb, Hex) VALUES ('Gray', '128,128,128', '#808080');".
        "INSERT INTO Colors (Name, Rgb, Hex) VALUES ('Black', '0,0,0', '#000000');");
    echo "Database created successfully";
    // closes db
    $conn = NULL;
} catch(PDOException $e) {
    print 'Exception : '.$e->getMessage();
}
*/
openOrCreateDB();
createTable();
<<<<<<< HEAD
// insertFaculty and insertDepartment could be run in a loop as a readFile method extracts the data from a file
insertFaculty('1', 'John Doe', 'johndoe@email.com');
insertFaculty('2', 'Jane Doe', 'janedoe@email.com');
insertFaculty('3', 'Henry Doe', 'henrydoe@email.com');

insertDepartment("Math","Department of numbers and weird symbols");
insertDepartment("Science","Department of everything");
insertDepartment("English","Department of spelling and reading");
insertDepartment("Health","Department of scrubs");
insertDepartment("Beer","Department of all that is Holy");

=======
insertData();
>>>>>>> 77f004d1ee0b4374e840c1200c48b760fb2b0a5b
outputData();
closeDB();

function openOrCreateDB(){
    global $conn;
    try {
        $conn = new PDO("sqlite:test.sqlite");
<<<<<<< HEAD
        echo "DB created successfully <br>";
=======
        echo "DB created successfully";
>>>>>>> 77f004d1ee0b4374e840c1200c48b760fb2b0a5b
    } catch (PDOException $e){
        echo 'Exception : '.$e->getMessage();
    }
}
function createTable(){
    global $conn;
    try {
<<<<<<< HEAD
        $sql = "CREATE TABLE IF NOT EXISTS Faculty (faculty_id INTEGER PRIMARY KEY, department_id INTEGER, full_name TEXT, email TEXT)";
        $conn->exec($sql);

        $sql = "CREATE TABLE IF NOT EXISTS Departments (department_id INTEGER PRIMARY KEY, depart_name TEXT, description TEXT)";
        $conn->exec($sql);

        echo "Tables created successfully <br>";
=======
        $conn->exec("CREATE TABLE Colors (id INTEGER PRIMARY KEY AUTOINCREMENT, Name TEXT, Rgb TEXT, Hex TEXT)");
        $conn->exec("CREATE TABLE Faculty (faculty_id INTEGER PRIMARY KEY AUTOINCREMENT, department_id INTEGER, name TEXT, email TEXT)");
        echo "Table created successfully";
>>>>>>> 77f004d1ee0b4374e840c1200c48b760fb2b0a5b
    } catch (PDOException $e){
        echo 'Exception : '.$e->getMessage();
    }
}
<<<<<<< HEAD
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
=======
function insertData(){
    global $conn;
    try {
        // insert data
        $conn->exec("INSERT INTO Colors (Name, Rgb, Hex) VALUES ('Red', '255,0,0', '#ff0000');".
            "INSERT INTO Colors (Name, Rgb, Hex) VALUES ('Lime', '0,255,0', '#00ff00');".
            "INSERT INTO Colors (Name, Rgb, Hex) VALUES ('Blue', '0,0,255', '#0000ff');".
            "INSERT INTO Colors (Name, Rgb, Hex) VALUES ('Yellow', '255,255,0', '#ffff00');".
            "INSERT INTO Colors (Name, Rgb, Hex) VALUES ('Aqua', '0,255,255', '#00ffff');".
            "INSERT INTO Colors (Name, Rgb, Hex) VALUES ('Fuchsia', '255,0,255', '#ff00ff');".
            "INSERT INTO Colors (Name, Rgb, Hex) VALUES ('Olive', '128,128,0', '#808000');".
            "INSERT INTO Colors (Name, Rgb, Hex) VALUES ('Teal', '0,128,128', '#008080');".
            "INSERT INTO Colors (Name, Rgb, Hex) VALUES ('Purple', '128,0,128', '#800080');".
            "INSERT INTO Colors (Name, Rgb, Hex) VALUES ('White', '255,255,255', '#ffffff');".
            "INSERT INTO Colors (Name, Rgb, Hex) VALUES ('Gray', '128,128,128', '#808080');".
            "INSERT INTO Colors (Name, Rgb, Hex) VALUES ('Black', '0,0,0', '#000000');");

        $conn->exec("INSERT INTO Faculty (department_id, name, email) VALUES ('Math', 'John Doe', 'johndoe@email.com');");

        echo "Inserted data successfully";
>>>>>>> 77f004d1ee0b4374e840c1200c48b760fb2b0a5b
    }catch (PDOException $e){
        echo 'Exception : '.$e->getMessage();
    }
}
function outputData(){
    global $conn;
    try {
        // queries database file for information
<<<<<<< HEAD
        $result = $conn->query('SELECT * FROM Departments');
        // formatting statements
        print "<style>table, th, td {border: 1px solid black; border-collapse: collapse; padding: 12px;
		text-align: center;}</style>";
        print "<table><br><tr><th>Id</th><th>Name</th><th>Description</th></tr>";
        // pulls results from returned data
        foreach($result as $row) {
            // prints formatted data
            print "<tr><td>".$row['department_id']."</td>";
            print "<td>".$row['depart_name']."</td>";
            print "<td>".$row['description']."</td>";
            print "<td></td></tr>";
=======
        $result = $conn->query('SELECT * FROM Colors');
        // formatting statements
        print "<style>table, th, td {border: 1px solid black; border-collapse: collapse; padding: 12px;
		text-align: center;}</style>";
        print "<table><br><tr><th>Id</th><th>Name</th><th>RGB</th><th>Color</th></tr>";
        // pulls results from returned data
        foreach($result as $row) {
            // prints formatted data
            print "<tr><td>".$row['Id']."</td>";
            print "<td>".$row['Name']."</td>";
            print "<td>".$row['Rgb']."</td>";
            print "<td bgcolor=\"".$row['Hex']."\"></td></tr>";
>>>>>>> 77f004d1ee0b4374e840c1200c48b760fb2b0a5b
        }
    } catch(PDOException $e) {
        print 'Exception : '.$e->getMessage();
    }
}
function closeDB(){
    global $conn;
    // closes db
    $conn = NULL;
}
?>