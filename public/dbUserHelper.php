<?php

    function insertUser($connection, $oauth_id, $name, $email) {
    $sqlstmt = "INSERT INTO USERS (oauthID, name, email)
                    VALUES (:oauthID, :name, :email)";
    try {
        $statement = $connection->prepare($sqlstmt);
        $statement->bindParam(':oauthID', $oauth_id);
        $statement->bindParam(':name', $name);
        $statement->bindParam(':email', $email);
        $statement->execute();
    }  catch (PDOException $e) {
      // returns internal server error if no table found
        header('HTTP/1.1 500 Internal Server Error');
        header('Content-Type: application/json; charset=UTF-8');
        $error_msg = "PHP Load error: ".$e->getMessage();
        // exits the program and sends json contianing error
        exit(json_encode(array("message" => "$error_msg")));
  }
}

function getUser($connection, $oauth_id) {
    $jsonArray = array();
    $sqlstmt = "SELECT * FROM USERS
                    WHERE oauthID = $oauth_id";
    try {
        $statement = $connection->prepare($sqlstmt);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $jsonData = $statement->fetchAll();
        $jsonArray = array('userInfo'=>$jsonData);
    }  catch (PDOException $e) {
      // returns internal server error if no table found
        header('HTTP/1.1 500 Internal Server Error');
        header('Content-Type: application/json; charset=UTF-8');
        $error_msg = "PHP Load error: ".$e->getMessage();
        // exits the program and sends json contianing error
        exit(json_encode(array("message" => "$error_msg")));
    }
    return $jsonArray;
}

?>