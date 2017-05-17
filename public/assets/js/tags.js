var radioChecked = "";

function addTag(btnId) {
    var text = "";

    switch(btnId){
        case "textBox":
            text = document.getElementById("textBox").value;
            break;
        case "radio":
            text = radioChecked;
            break;
    }
    var btn = document.createElement("BUTTON");
    btn.setAttribute("id", text);
    btn.setAttribute("onclick", "removeTag(this.id)");
    btn.setAttribute("class", "tags")
    var t = document.createTextNode(text + " X");
    btn.appendChild(t);
    document.body.appendChild(btn);
    document.getElementById("tagDiv").appendChild(btn);
}
function removeTag(clicked_id) {
    var parent = document.getElementById("tagDiv");
    var child = document.getElementById(clicked_id);
    parent.removeChild(child);
}
function isChecked(value){
    radioChecked = value;
}
