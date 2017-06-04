<?php
//simple php form

//check for directly accessing page
if (!isset($_POST['submit'])) {
   echo "<h1>Error</h1>\n
      <p>Accessing this page directly is not allowed.</p>";
   exit;
}

$email = preg_replace("([\r\n])", "", $email);

$find = "/(content-type|bcc:|cc:)/i";
if (preg_match($find, $name) || preg_match($find, $email) || preg_match($find, $url) || preg_match($find, $comments)) {
   echo "<h1>Error</h1>\n
      <p>No meta/header injections, please.</p>";
   exit;
}

//set title of message
$message = "Message from TIP Web Application: \n";

//get form data
foreach ($_POST as $key => $value){
    if($key == 'submit'){
        continue;
    }else{
        $message .= htmlspecialchars($key).": ".htmlspecialchars($value)."\n";
    }
}

//send form
mail('markdpfaff@gmail.com', 'Message from TIP Web Application', $message);

