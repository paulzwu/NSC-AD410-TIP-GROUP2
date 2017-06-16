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
$message = "<ul>"."Message from TIP Web Application: \n";

//get form data
foreach ($_POST as $key => $value){
    if($key == 'submit'){
        continue;
    }else{
        $message .="<li>". htmlspecialchars($key).": ".htmlspecialchars($value)."</li>";
    }
}
$message .= "</ul>"
   

foreach ($_POST as $key => $value){
    if($key == 'submit'){
        continue;
    }else{
        $name .="<li>". htmlspecialchars($key).": ".htmlspecialchars($value)."</li>";
    }
}
foreach ($_POST as $key => $value){
    if($key == 'submit'){
        continue;
    }else{
        $email .="<li>". htmlspecialchars($key).": ".htmlspecialchars($value)."</li>";
    }
}

// Help form email style
$finalMessage = '
<!DOCTYPE html>
<html>
<head>
<header style="color: dark gray; display:block;"><h1 style="font-size: 32px;font-weight: bold;display: block; text-align: center;"> Help Question </h1></header>
</head>
<body>
<br>	
<br>
<h2 style="border-style: solid;border-width:2px;text-align:left;font-size: 20px;font-weight: bold;margin-right: 20%;margin-left: 10%;">Name: '. $name .'
<br>
<br>
Email Address: '.$emailAddress.'
<br>
<br>
Message: '.$message.' </h2>
</body>
</html>
'
     
   
//send form
mail('markdpfaff@gmail.com', 'Message from TIP Web Application', $finalMessage);

//redirect to thankyou page
header( 'Location: thanks.php' ) ;

