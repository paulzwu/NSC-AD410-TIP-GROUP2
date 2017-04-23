<!DOCTYPE html>
<html>
	<head>
		<style type="text/css">
			*,
			*:before,
			*:after {
			   box-sizing: border-box;
			}
			form {
			  border: 1px solid #c6c7cc;
			  border-radius: 5px;
			  font: 14px/1.4 "Helvetica Neue", Helvetica, Arial, sans-serif;
			  overflow: hidden;
			  max-width:960;
			  width: 60%;
			  margin: 0 auto;
			}
			fieldset {
			  border: 0;
			  margin: 0;
			  padding: 0;
			}
			input {
			  border-radius: 5px;
			  font: 14px/1.4 "Helvetica Neue", Helvetica, Arial, sans-serif;
			  margin: 0;
			}
			.feedback {
			  padding: 20px 20px 0 20px;
			}
			.feedback label {
			  color: #395870;
			  display: block;
			  font-weight: bold;
			  margin-bottom: 20px;
			}
			.feedback input {
			  background: #fff;
			  border: 1px solid #c6c7cc;
			   box-shadow: inset 0 1px 1px rgba(0, 0, 0, .1);
			  color: #636466;
			  padding: 6px;
			  margin-top: 6px;
			  width: 100%;
			}
			.account-action {
			  background: #f0f0f2;
			  border-top: 1px solid #c6c7cc;
			  padding: 20px;
			}
			.account-action .btn {
			  background: linear-gradient(#49708f, #293f50);
			  border: 0;
			  color: #fff;
			  cursor: pointer;
			  font-weight: bold;
			  float: left;
			  padding: 8px 16px;
			}
			.account-action label {
			  color: #7c7c80;
			  font-size: 12px;
			  float: left;
			  margin: 10px 0 0 20px;
			}
			.label {
				font-weight:bold;
			}
		</style>
	</head>
	<body>
	<?php
		$subject_line = $comments = $category = '';
		$action = htmlspecialchars($_SERVER['PHP_SELF']);
		$to = "admin@northseattlecollege.edu";
		$from = "(this info will be pulled from DB)";
		if (isset($_POST['submit'])) {
			if(isset($_POST['subject'])){
				$subject_line = $_POST['subject'];
			}
			if(isset($_POST['category'])){
				$category = $_POST['category'];
			}
			if(isset($_POST['comments'])){
				$comments = $_POST['comments'];
			}
		}
		if (!empty($_POST['submit'])) {
			$subject = $category.$subject_line;
			$message = wordwrap($comments, 70, "\r\n");
			
			// code to implement once we have a working mail server to user
			// if email needs to be HTML, can create headers in a separate file
			// to allow this

			// mail($to,$subject,$message,$from);
			echo "<p><h2>Feedback Email</h2></p>
				<p>Example of email sent to admin:</p>
				<p><span class=label>Sender:</span> {$from}</p>
				<p><span class=label>Recipient:</span> {$to}</p>
				<p><span class=label>Subject line:</span> {$subject}</p>
				<p><span class=label>Message:</span> {$message}</p>";
		} else {
			echo "<h2>Draft Feedback Form</h2>
				<form action=\"{$action}\" method=\"post\">
				  <fieldset class=\"feedback\">
					<label>Subject</label>
					  <input type=\"text\" name=\"subject\">
					<label>Category</label>
					  <select name=\"category\" required>
						<option value=\"Question Help: \" selected>Help with a question</option>
						<option value=\"Technical Help: \">Technical assistance</option>
						<option value=\"Login Help: \">Help with logging in</option>
						<option value=\"Comments: \">Comments or feedback</option>
						<option value=\"Other: \">Other assistance</option>
					  </select>
					<label>Please provide detailed information about your question or comment below:</label>
					<textarea name=\"comments\" rows=\"4\" cols=\"100\"></textarea>
					<input class=\"sendFeedback\" type=\"submit\" name=\"submit\" value=\"Send\">
				  </fieldset>
				</form>";
		}
	?>
	</body>
</html>
