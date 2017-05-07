<!DOCTYPE html>
<html>
	<head>
		<style></style>
	</head>
	<body>
	<?php
		// set correct time for interacting with server
		date_default_timezone_set('Etc/UTC');
		
		// requires that this php file be loaded (it loads up the rest of phpmailer)
		require 'PHPMailerAutoload.php';

		// creates a new PHPMailer object
		$mail = new PHPMailer;
		// tells phpmailer that we are using an smtp server
		$mail->isSMTP();
		
		// ---------------------------------------------------------------------------
		// use the following when configuring a real email server:
		//Set the hostname of the mail server
			//$mail->Host = "mail.markpfaff.com";
		//Set the SMTP port number - likely to be 25, 465 or 587
			//$mail->Port = 465;
		//Whether to use SMTP authentication
			//$mail->SMTPAuth = true;
		// smtp server username
			//$mail->Username = "group2@markpfaff.com";
		//Password to use for SMTP authentication
			//$mail->Password = "NSCR0ck$";
		// ---------------------------------------------------------------------------
		// TEST CODE - download https://github.com/ChangemakerStudios/Papercut to test
		// email functionality without needing a live email server
			$mail->Host = "127.0.0.1";
			$mail->Port = 25;
		//Enable SMTP debugging for testing purposes
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
			//$mail->SMTPDebug = 2;
		//Ask for HTML-friendly debug output
			//$mail->Debugoutput = 'html';
		// ---------------------------------------------------------------------------
		
		// static and instantiated variables
		$message = '';
		$admin_email = 'TIP-admin@northseattle.edu';
		$admin_name = "TIP Admin";
		$helpDesk_response_header = 'The following is a copy of the email you sent to the help desk:<br><br>';
		
		// ---------------------------------------------------------------------------
		// implement code here to get the user's email address here - for testing, a field has been
			$user_email = '';
		// created so you can enter in an email of your choosing
		// ---------------------------------------------------------------------------
		
		// sets form action to point to self
		$action = htmlspecialchars($_SERVER['PHP_SELF']);
		
		if (!empty($_POST['submit'])) {
			// wordrap takes long strings and creates newline after so many characters
			// str_replace is replacing \n with html code (<br>)
			$message = wordwrap(str_replace("\n", "<br>", $_POST['comments']), 70, "<br>\n", TRUE);
			
			// used by phpmailer for form email header and body
			$mail->setFrom($admin_email, $admin_name);
			$mail->addAddress($_POST['from']);
			$mail->Subject = $_POST['category'] . $_POST['subject'];
			$mail->Body = $helpDesk_response_header . $message;
			$mail->IsHTML(true);
			
			if(!$mail->send()) {
			// output error message if email does not go thru (maybe update this to a more
			// general message with an old fashioned mailto link when implementing on live server
			  echo 'Message was not sent. ';
			  echo 'Mailer error: ' . $mail->ErrorInfo;
			} else {
				// displays what was sent to admin
				echo "	<p><h2>Feedback Email</h2></p>
		<p>Message has been sent!</p>
		<p>Transcript of email</p>
		<p><span class=label>Sender:</span> {$admin_email}</p>
		<p><span class=label>Recipient:</span> {$user_email}</p>
		<p><span class=label>Subject line:</span> {$_POST['category']}{$_POST['subject']}</p>
		<p>{$helpDesk_response_header}{$message}</p>";
			}
		} else {
			// this is displayed if you have not pressed submit (this is default view when loading page)
			echo "	<h2>Draft Feedback Form</h2>
		<form action=\"{$action}\" method=\"post\">
		  <fieldset class=\"feedback\">
			<p><label>Subject</label><br>
			<input type=\"text\" name=\"subject\"></p>
			<!-- remove From field when implementing code to obtain user email from db -->
			<p><label>From</label><br>
			<input type=\"text\" name=\"from\"></p>
			<!-- ===================================================================== -->
			<p><label>Category</label><br>
			<select name=\"category\" required>
				<option value=\"Question Help: \" selected>Help with a question</option>
				<option value=\"Technical Help: \">Technical assistance</option>
				<option value=\"Login Help: \">Help with logging in</option>
				<option value=\"Comments: \">Comments or feedback</option>
				<option value=\"Other: \">Other assistance</option>
			</select></p>
			<p><label>Please provide detailed information about your question or comment below:</label><br>
			<textarea name=\"comments\" rows=\"4\" cols=\"100\"></textarea></p>
			<input class=\"sendFeedback\" type=\"submit\" name=\"submit\" value=\"Send\">
		  </fieldset>
		</form>";
		}
	?>
	
	</body>
</html>
