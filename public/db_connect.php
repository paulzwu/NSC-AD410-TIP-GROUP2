<?php

  $db = "DB/db.sqlite";

  try {
    $conn = new PDO("sqlite:" . $db);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
		echo "PHP connection error: ".$e->getMessage();
	}

?>
