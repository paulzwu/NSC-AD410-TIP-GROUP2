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
    var radioChecked = "";
    var text = "";
    var tagCounter = 0;
    var searchByCol = 0;
    var statsComplete, statsInProgress, statsNotStarted;
    var dataTable = [];
    var questions = [];
    var answers = [];
    var index = null;

    $(document).ready(function() {
        initTable();

        var table = $('#table_id').DataTable();
        $('#table_id tbody').on( 'click', 'tr', function () {
            //alert( 'Row index: '+table.row( this ).index() );
            index = table.row( this ).index();
            //alert(table.row( this ).index());
            displayTip();
        } );
    });


    //add tag based on filter
    function addTag(btnId) {
        switch(btnId){
            case "textBox":
                text = document.getElementById("textBox").value;
                if (text != "" && isDuplicate() == false && tagCounter < 5) {
                    searchFilter();
                }
                break;
            case "divisions":
                text = document.getElementById("divisions").value;
                if (text != "" && isDuplicate() == false && tagCounter < 5) {
                    searchFilter();
                }
                break;
            case "date":
                text = document.getElementById("date").value;
                if (text != "" && isDuplicate() == false && tagCounter < 5) {
                    searchFilter();
                }
                break;
            case "assessment":
                text = document.getElementById("textBoxAssessment").value;
                if (text != "" && isDuplicate() == false && tagCounter < 5) {
                    switch (document.getElementById("searchBy").value){
                        case "Question":
                            searchByCol = 6;
                            keywordSearch();
                            break;
                        case "Answer":
                            searchByCol = 7;
                            keywordSearch();
                            break;
                        case "Course":
                            searchByCol = 5;
                            keywordSearch();
                            break;
                        case "Shared":
                            searchByCol = 4;
                            keywordSearch();
                            break;
                    }
                    text = document.getElementById("textBoxAssessment").value;
                    searchFilter();
                }
                break;
            case "status":
                text = document.getElementById("status").value;
                if (text != "" && isDuplicate() == false && tagCounter < 5) {
                    searchFilter();
                }
                break;
        } //end of switch case

        createTag();

        $('#textBox').val(null);
        $('#textBoxAssessment').val(null);

    } //end of addTag function

    function createTag(){
        if(text != ""){
            if(isDuplicate() == false){
                if(tagCounter < 5){
                    var btn = document.createElement("BUTTON");
                    btn.setAttribute("id", text);
                    btn.setAttribute("onclick", "removeTag(this.id)");
                    btn.setAttribute("class", "tags");
                    var t = document.createTextNode(text + "  x");
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

    function searchFilter(){
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

    //selecting radio button if it is check
    function isChecked(value){
        radioChecked = value;
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
                            shared = shared.substring(0,3);
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
                        dataTable.push([data[i].name, date, data[i].Division, data[i].complete, shared, data[i].Course_ID + "" + data[i].Course_Prefix, questions[i], answers[i], "View", i]);
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
                {data: 6, title: 'Questions', "visible": false, "searchable": false},
                {data: 7, title: 'Answers', "visible": false, "searchable": false},
                {
                    data: 8, title: 'View', "searchable": false,
                    "render": function (data, type) {
                        if (type === 'display') {
                            //data = '<a href="tip.php" target="_blank">'+ data +'</a>';
                        }

                        return data;
                    }
                },
                {data: 9, title: 'Index', "visible": true}
            ]
        });
    }

    function displayTip() {
        // Create table and pass in questions and answers that correspond with the index
        var table = $('#table_id').DataTable();
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
