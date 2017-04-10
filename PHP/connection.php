<?php

	//need server name to connect to and username and password to connect with

	$servername = "";
	$username = "";
	$password = "";

	$conn = new mysqli($servername, $username, $password);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
?>

