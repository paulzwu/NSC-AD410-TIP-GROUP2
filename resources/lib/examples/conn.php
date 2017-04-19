<?php
	try {
	//open the database - creates the db if file not present
		$conn = new PDO("sqlite:examples/test.sqlite");
		// sets attributes to catch errors
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		// this line for testing purposes
		echo "Connection successful<br>";
	} catch(PDOException $e) {
		print 'Exception : '.$e->getMessage();
	}
?>
