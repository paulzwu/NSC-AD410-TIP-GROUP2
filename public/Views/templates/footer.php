<!-- Footer-->
<footer>
    © 2017 ADBAS PROGRAM | NORTH SEATTLE COLLEGE
</footer>
<!-- </div> -->


<!--   Core JS Files   -->
<script src="assets/js/lib/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.jqueryui.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.15/api/fnFilterClear.js"></script>
<script src="assets/js/lib/raphael-2.1.4.min.js"></script>
<script src="assets/js/lib/justgage.js"></script>
<script src="assets/js/tipprogress.js"></script>
<script src="assets/js/light-bootstrap-dashboard.js"></script>
<script src="assets/js/responsive_nav.js"></script>



<!-- Response Rate Assets -->
<script>
    //global variables
    var filter = [];
    var text = "";
    var tagCounter = 0;
    var statsComplete, statsInProgress, statsNotStarted;
    var dataTable = [];
    var questions = [];
    var answers = [];
    var completeAssessmentJSON = {};
    var count = 0;
    var index = null;

    $(document).ready(function() {
        initTable();

        // DataTable
        var table = $('#table_id').DataTable();

        $('#table_id tbody').on( 'click', 'tr', function () {
            //alert( 'Row index: '+table.row( this ).index() );
            index = table.row( this ).index();
            window.open("view_complete_assessment.php", '_blank');
            //alert(table.row( this ).index());
        } );
    });


    //add tag based on filter
    function addTag(btnId) {
        switch(btnId){
            case "textBox":
                text = document.getElementById("textBox").value;
                if (text != "" && isDuplicate() == false && tagCounter < 5) {
                    keywordSearch();
                }
                break;
            case "divisions":
                text = document.getElementById("divisions").value;
                if (text != "" && isDuplicate() == false && tagCounter < 5) {
                    searchFilter(2);
                }
                break;
            case "date":
                text = document.getElementById("nameBox").value;
                if (text != "" && isDuplicate() == false && tagCounter < 5) {
                    searchFilter(0);
                }
                break;
            case "assessment":
                text = document.getElementById("textBoxAssessment").value;
                if (text != "" && isDuplicate() == false && tagCounter < 5) {
                    switch (document.getElementById("searchBy").value){
                        case "Question":
                            searchFilter(6);
                            break;
                        case "Answer":
                            searchFilter(7);
                            break;
                        case "Course":
                            searchFilter(5);
                            break;
                        case "Year":
                            searchFilter(1);
                            break;
                    }
                    //text = document.getElementById("textBoxAssessment").value;
                    //searchFilter();
                }
                break;
            case "status":
                text = document.getElementById("status").value;
                if (text != "" && isDuplicate() == false && tagCounter < 5) {
                    searchFilter(3);
                }
                break;
        } //end of switch case

        createTag();

        $('#textBox').val(null);
        $('#nameBox').val(null);
        $('#textBoxAssessment').val(null);

    } //end of addTag function

    function createTag(){
        if(text != ""){
            if(isDuplicate() == false){
                if(tagCounter < 5){
                    var btn = document.createElement("BUTTON");
                    btn.setAttribute("id", text);
                    //btn.setAttribute("onclick", "removeTag(this.id)");
                    btn.setAttribute("class", "tags");
                    var t = document.createTextNode(text);
                    btn.appendChild(t);
                    document.body.appendChild(btn);
                    document.getElementById("tagDiv").appendChild(btn);
                    tagCounter ++;
                }else {
                    alert("No more than 5 tags are allowed");
                }
            }else {
                alert("Duplicates not allowed");
            }
        }else{
            alert("Please select a filter");
        }
    }

    function searchFilter(colNum){
        filter.push(text);
        var table = $('#table_id').DataTable();
        table
            .columns(colNum)
            //.search(filter.join("  "))
            .search(text)
            .draw();
    }

    function keywordSearch(){
        filter.push(text);
        var table = $('#table_id').DataTable();
        table
            .search(filter.join("  "))
            .draw();
    }

    //remove the tag
    function removeTag(clicked_id) {
        var parent = document.getElementById("tagDiv");
        var child = document.getElementById(clicked_id);
        parent.removeChild(child);

        // gets the index of the button and deletes it
        var index = filter.indexOf(clicked_id);
        filter.splice(index, 1);

        var table = $('#table_id').DataTable();
        table
            .search( filter.join("  ") )
            .draw();
        tagCounter --;
    }

    //check if input tag is duplicate
    function isDuplicate(){
        var element = document.getElementById(text);
        return document.getElementById("tagDiv").contains(element);
    }

    function clearTags(){
        filter = [];
        $('.tags').remove();
        var table = $('#table_id').DataTable();
        table
            .search( '' )
            .columns().search( '' )
            .draw();
        tagCounter = 0;
    }

    function initTable(){
        $('#table_id').DataTable({
            "processing": true,
            dom: 'lrtip',
            "ajax": {
                url: "results.json",
                dataSrc: function (data) {
                    statsComplete = 0;
                    statsInProgress = 0;
                    statsNotStarted = 0;

                    for (i = 0; i < data.length; i++) {
                        var date = data[i].time_complete;
                        var shared = data[i].Share;
                        if (date != null){
                            date = date.substring(0,4);
                        }
                        if (shared != null){
                            shared = shared.substring(0,1);
                        }
                        var questionResult = [];
                        var answerResult = [];
                        for (j in data[i].surveyJSON) {
                            questionResult.push(data[i].surveyJSON[j]);
                        }
                        questions.push(questionResult);
                        for (j in data[i].answerJSON) {
                            answerResult.push(data[i].answerJSON[j]);
                        }
                        answers.push(answerResult);
                        dataTable.push([data[i].name, date, data[i].Division, data[i].complete, shared, data[i].Course_ID + "" + data[i].Course_Prefix, questions[i], answers[i], "View"]);
                        if (dataTable[i][3] == "1") {
                            dataTable[i][3] = "Complete";
                            statsComplete++
                        } else if (dataTable[i][3] == "0"){
                            dataTable[i][3] = "In-Progress";
                            statsInProgress++
                        } else if (dataTable[i][3] == null){
                            dataTable[i][3] = "Not Started";
                            statsNotStarted++
                        }
                    }
                    // update dashboard gauges
                    complete.refresh(statsComplete);
                    inprogress.refresh(statsInProgress);
                    notstarted.refresh(statsNotStarted);

                    var totalFacultyNum = dataTable.length;
                    document.getElementById('totalFaculty').innerHTML = "Total Responses Expected: " + totalFacultyNum;

                    var waitingNum = statsNotStarted + statsInProgress;
                    document.getElementById('waitingOn').innerHTML = "Waiting on: " + waitingNum;

                    return dataTable
                }
            },

            columns: [
                {data: 0, title: 'Name'},
                {data: 1, title: 'Year'},
                {data: 2, title: 'Division'},
                {data: 3, title: 'Status'},
                {data: 4, title: 'Shared', "visible": true},
                {data: 5, title: 'Course', "visible": true},
                {data: 6, title: 'Questions', "visible": false, "searchable": true},
                {data: 7, title: 'Answers', "visible": false, "searchable": true},
                {
                    data: 8, title: 'View', "searchable": false,
                    "render": function (data, type) {
                        if (type === 'display') {
                            data = '<a href="#" onclick="return false">'+ data +'</a>';
                        }
                        return data;
                    }
                }
            ]
        });
    }

    function createTable() {
        // Create table.
        // If you want to change the style with css, use setAttribute to set id, class, etc.
        // Example: table.setAttribute("id", "tableId")
        var idx = window.opener.index;
        var ques = window.opener.questions;
        var ans = window.opener.answers;
        var table = document.createElement('TABLE');
        table.style.border = "thick solid black";
        var header = table.createTHead();
        // Insert New Row for table at index '0'.
        var headerRow = header.insertRow(0);
        headerRow.style.backgroundColor = "lightgray";
        headerRow.style.textAlign = "center";
        headerRow.style.fontSize = "24px";
        // Insert New Column for Row1 at index '0'.
        var colName1 = headerRow.insertCell(0);
        colName1.style.width = "50%";
        colName1.innerHTML = 'Questions';
        // Insert New Column for Row1 at index '1'.
        var colName2 = headerRow.insertCell(1);
        colName2.style.width = "50%";
        colName2.innerHTML = 'Answers';

        for (i = 1; i <= ques[idx].length; i++){
                var row = table.insertRow(i);
            if (i % 2 == 0) {
                row.style.backgroundColor = "lightgray";
            }
                var question = row.insertCell(0);
                question.innerHTML = ques[idx][i - 1];
                var answer = row.insertCell(1);
                answer.innerHTML = ans[idx][i - 1];
                completeAssessmentJSON[count] = [ques[idx][i - 1], ans[idx][i - 1]];
                count++;
        }
        // Append Table into div.
        var div = document.getElementById('completedTIP');
        div.appendChild(table);
        completeAssessmentJSON = JSON.stringify(completeAssessmentJSON);
    }

    function displayTip() {
        // Create table and pass in questions and answers that correspond with the index
        console.log(questions);
        questions[index].forEach(function (item) {
            console.log(item);
        });
        answers[index].forEach(function (item) {
            console.log(item);
        });
        //alert(questions[index][10] + " - " + answers[index][10]);
    }


</script>
<script src="assets/js/report_export.js"></script>


</body>
</html>
