
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
