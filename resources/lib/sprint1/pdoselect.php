<?php

  $db = new SQLite3('db/mydb');  // placeholder for db name
  // Error handling
  if(!$db) {
    echo $db->lastErrorMsg();
  } else {
    echo "Opened database successfully\n";
  }

  $sql = "SELECT email
          FROM Admin";

  $result = $db->query($sql);
  // Retrieves email from admin database
  try {
      while($row = $result->fetchArray(SQLITE3_ASSOC) ) {
        $admin_email = $row['email'];
      }
  } catch (Exception $e) {
    echo 'Exception: ', $e->getMessage(), "\n";
  } finally {
    $db->close();
  }

?>
