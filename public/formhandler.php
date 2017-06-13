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

// Help form email style 
                      <h1 style="font-size: 32px;font-weight: bold;display: block; text-align: center;">Help</h1>
<br>
<h3 style="border-style: solid;border-width:2px;text-align:left;">		
<h2 style="font-size: 20px;font-weight: bold;margin: auto;">Name: John Snow</h2>
<br>
<h2 style="font-size: 20px;font-weight: bold;margin: auto;">Email Address: hello@example.com</h2>
<br>
<h2 style="font-size: 20px;font-weight: bold;margin: auto;">Message: How do I do this?</h2>
</h3>
   
//send form
mail('markdpfaff@gmail.com', 'Message from TIP Web Application', $message);

//redirect to thankyou page
header( 'Location: thanks.php' ) ;

