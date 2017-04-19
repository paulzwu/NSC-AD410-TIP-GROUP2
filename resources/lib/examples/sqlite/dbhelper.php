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
insertData();
outputData();
closeDB();

function openOrCreateDB(){
    global $conn;
    try {
        $conn = new PDO("sqlite:test.sqlite");
        echo "DB created successfully";
    } catch (PDOException $e){
        echo 'Exception : '.$e->getMessage();
    }
}
function createTable(){
    global $conn;
    try {
        $conn->exec("CREATE TABLE Colors (Id INTEGER PRIMARY KEY, Name TEXT, Rgb TEXT, Hex TEXT)");
        echo "Table created successfully";
    } catch (PDOException $e){
        echo 'Exception : '.$e->getMessage();
    }
}
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
        echo "Inserted data successfully";
    }catch (PDOException $e){
        echo 'Exception : '.$e->getMessage();
    }
}
function outputData(){
    global $conn;
    try {
        // queries database file for information
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