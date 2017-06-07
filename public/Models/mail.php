<?php
namespace App\Models;

class Support
{

  public static function mail() {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phoneNo = $_POST["phone"];
    $comments = $_POST["comments"];
    $headers = "From:" . $email;
    $message = "Message from: {$name}" . "\r\n" . "Email: {$email}" . "\r\n" .
               "Phone No: {$phoneNo}" . "\r\n\r\n" .  "{$comments}";

    $admin = admin@email.com;
    $subject = "A TIPS user has contacted you"

    try {
      mail($admin, $subject, $message, $headers);
    }
    catch (Exception $e) {
      echo "Could not send email: ".$e->getMessage();
    }

  }
}
