<?php
/**
 * Created by PhpStorm.
 * User: zw251y
 * Date: 3/10/2016
 * Time: 2:56 PM
 */

include "conn_proc.php";

// sql to delete a record
$sql = "DELETE FROM MyGuests WHERE id= 5";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
