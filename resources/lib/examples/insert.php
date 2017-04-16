<?php

	// sample data insertion script
	include 'connection.php';
	try {
	   // inserts data into database
	   $conn->exec("INSERT INTO Colors (Name, Rgb, Hex) VALUES ('Light Steel Blue', '176,196,222', '#b0c4de');".
			"INSERT INTO Colors (Name, Rgb, Hex) VALUES ('Dark Khaki', '189,183,107', '#bdb76b');".
			"INSERT INTO Colors (Name, Rgb, Hex) VALUES ('Salmon', '250,128,114', '#fa8072');".
			"INSERT INTO Colors (Name, Rgb, Hex) VALUES ('Antique White', '250,235,215', '#faebd7');".
			"INSERT INTO Colors (Name, Rgb, Hex) VALUES ('Gainsboro', '220,220,220', '#dcdcdc');");
             print "New colors added: Light Steel Blue, Dark Khaki, Salmon, Antique White, Gainsboro.";
            // closes connection to database
	   $conn = NULL;
	} catch(PDOException $e) {
	   print 'Exception : '.$e->getMessage();
	}
?>
