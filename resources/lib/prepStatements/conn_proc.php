<?php
/**
 * Created by PhpStorm.
 * User: zw251y
 * Date: 3/10/2016
 * Time: 2:45 PM
 */

$servername = "localhost";
$username = "ad320";
$password = "ad320_test";
$dbname = "ad320";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}