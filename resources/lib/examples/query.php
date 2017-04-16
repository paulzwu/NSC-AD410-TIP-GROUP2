<?php
	// sample query script
	include '../connection.php';
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
		// closes connection to database
		$conn = NULL;
	} catch(PDOException $e) {
		print 'Exception : '.$e->getMessage();
	}
?>
