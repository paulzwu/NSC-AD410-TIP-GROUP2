<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Admin Dashboard TIP Page</title>
  <link href="https://fonts.googleapis.com/css?family=Work+Sans|Rubik|Roboto" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<? echo assert('css/bootstrap.min.css');?>" />
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
  <link href="css/tagtacular.css?donotcache=20130703" rel="stylesheet" type="text/css" />
  <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
</head>
<!---
innerHTML styles
-->
<style>
.tags {
  margin: 10px;
}

button {
  width:110px;
  margin-top: 10px;
}
</style>

<body>
  <div class="content">
    <div class="container">
      <form id="myFilter">
        <div class="row">
          <div class="col-md-2">
            <div class="well">
              <input type="text" id="textBox" placeholder="keyword" maxlength="30"  style="width:120px">
              <button type="button" class="btn btn-primary btn-tiny"  onClick=addTag("textBox")>add criteria</button>
            </div>
          </div>

          <div class="col-md-2">
            <div class="well"><label>By division</label>
              <div class="radio">
                <label><input type="radio" value="AHSS" name="optradio" onclick=isChecked(this.value) >AHSS</label>
              </div>
              <div class="radio">
                <label><input type="radio"  value="HHS" name="optradio" onclick=isChecked(this.value)>HHS</label>
              </div>
              <div class="radio">
                <label><input type="radio" value="BTS" name="optradio" onclick=isChecked(this.value)>BTS</label>
              </div>
              <div class="radio">
                <label><input type="radio" value="BEIT" name="optradio" onclick=isChecked(this.value)>BEIT</label>
              </div>
              <div class="radio">
                <label><input type="radio" value="LIB" name="optradio" onclick=isChecked(this.value)>LIB</label>
              </div>
              <div class="radio">
                <label><input type="radio"  value="M&amp;S" name="optradio" onclick=isChecked(this.value)>M&amp;S</label>
              </div>
              <button type="button" class="btn btn-primary btn-tiny"  onClick=addTag("radio")>add criteria</button></div>
            </div>

            <div class="col-md-2">
              <div class="well">
                <label for="sel1">By Academic year:</label>
                <select class="form-control" id="quartlydate">
                  <option>date</option>
                  <option>3/5/14</option>
                  <option>4/6/15</option>
                  <option>6/4/16</option>
                </select>
                <button type="button" class="btn btn-primary btn-tiny"  onClick=addTag("date") style="width:120px">add criteria</button>
              </div>
            </div>
            <div class="col-md-2">
              <div class="well">
                <label for="sel1">Learning Outcome</label>
                <select class="form-control" id="learnOutcome">
                  <option>learning outcome</option>
                  <option>learning outcome2</option>
                  <option>learning outcome3</option>
                  <option>learning outcome4</option>
                </select>
                <button type="button" class="btn btn-primary btn-tiny"  onClick=addTag("outcome") style="width:120px">add criteria</button></div>
              </div>
              <div class="col-md-2">
                <div class="well">
                  <label for="sel1">Question</label>
                  <select  class="form-control" id="questions">
                    <option>question</option>
                    <option>question2</option>
                    <option>question3</option>
                    <option>question4</option>
                  </select>
                  <button type="button" class="btn btn-primary btn-tiny" onClick=addTag("question")>add criteria</button>
                </div>
              </div>
              <div>
                <button type="button" id="resetTag" class="btn btn-primary btn-tiny"  onClick=this.form.reset() type="reset">reset criteria</button></div>
              </div>
            </form>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-md-10">

              <div id="tagDiv">
              </div>
            </div>
            <div class="col-md-2">
              <button type="button"  class="btn btn-primary btn-tiny" onClick=clearTag() style="align:right" type="reset">clear tag</button>
            </div>
          </div>
        </div>
        <script>
        //global variable
        var radioChecked = "";
        var text = "";

        //add tag based on filter
        function addTag(btnId) {
                  switch(btnId){
                    case "textBox":
                    text = document.getElementById("textBox").value;
                    break;
                    case "radio":
                    text = radioChecked;
                    break;
                    case "date":
                    text = document.getElementById("quartlydate").value;
                    break;
                    case "outcome":
                    text = document.getElementById("learnOutcome").value;
                    break;
                    case "question":
                    text = document.getElementById("questions").value;
                    break;
                  } //end of switch case

                  if(text != ""){
                    if(isDuplicate()){
                      alert("No duplicate");
                    }else{
                  var btn = document.createElement("BUTTON");
                  btn.setAttribute("id", text);
                  btn.setAttribute("onclick", "removeTag(this.id)");
                  btn.setAttribute("class", "tags")
                  var t = document.createTextNode(text + "  x");
                  btn.appendChild(t);
                  document.body.appendChild(btn);
                  document.getElementById("tagDiv").appendChild(btn);
                    }
                }else{
                  alert("Enter a input");
                }
        } //end of addTag function

        //remove the tag
        function removeTag(clicked_id) {
          var parent = document.getElementById("tagDiv");
          var child = document.getElementById(clicked_id);
          parent.removeChild(child);
        }

        //selecting radio button if it is check
        function isChecked(value){
          radioChecked = value;


        }
        //check if input tag is duplicate
        function isDuplicate(){
          var element = document.getElementById(text);
          var dupElement = document.getElementById("tagDiv").contains(element);
          return dupElement;
        }

        //clear button for the tag
        function clearTag(){
          document.getElementById("tagDiv").innerHTML = "";
        }
        </script>
      </body>
      </html>
