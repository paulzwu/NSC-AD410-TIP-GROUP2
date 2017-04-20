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

	</style>
</head>
<body>

<h2>Draft Feedback Form</h2>

<form action="mailto:someone@example.com" method="post" enctype="text/plain">

  <fieldset class="feedback">
    <label>Subject
      <input type="text" name="subject">
    </label>	 
	
    <label>
      Category
      <select name="category" required>
        <option value="1" selected>1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>
    </label>

    <label>
      Comments/Questions/Suggestions
	  </label>
      <textarea name="comments" rows="10"></textarea>
	  
	  
    <input class="sendFeedback" type="submit" name="submit" value="Send">

  </fieldset>
  


</form>

</body>
</html>

