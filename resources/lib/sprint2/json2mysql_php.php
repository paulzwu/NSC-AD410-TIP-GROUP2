<?php

//Step 1: Connect PHP to MySQL Database

	
		$con = mysql_connect("username","password","") or die('Could not connect: ' . mysql_error());
		mysql_select_db("employee", $con);
	
	//Here "employee" is the MySQL Database name we want to store the JSON object

//Step 2: Read the JSON file in PHP<?php
    
    //read the json file contents
		$jsondata = file_get_contents('empdetails.json');
	
	//Here "empdetails.json" is the JSON file name we want to read
//Step 3: Convert JSON String into PHP Array
	
    //convert json object to php associative array
		$data = json_decode($jsondata, true);
	
	//The first parameter $jsondata contains the JSON file contents.
	//The second parameter true will convert the string into php associative array.
	
//Step 4: Extract the Array Values
	
    //get the employee details. parse the above JSON array element one by one and store them into PHP variables.
    $id = $data['empid'];
    $name = $data['personal']['name'];
    $gender = $data['personal']['gender'];
    $age = $data['personal']['age'];
    $streetaddress = $data['personal']['address']['streetaddress'];
    $city = $data['personal']['address']['city'];
    $state = $data['personal']['address']['state'];
    $postalcode = $data['personal']['address']['postalcode'];
    $designation = $data['profile']['designation'];
    $department = $data['profile']['department'];
	
	
//Step 5: Insert JSON to MySQL Database with PHP Code
	
    //insert into mysql table
    $sql = "INSERT INTO tbl_emp(empid, empname, gender, age, streetaddress, city, state, postalcode, designation, department)
    VALUES('$id', '$name', '$gender', '$age', '$streetaddress', '$city', '$state', '$postalcode', '$designation', '$department')";
    if(!mysql_query($sql,$con))
    {
        die('Error : ' . mysql_error());
    }
	
?>
