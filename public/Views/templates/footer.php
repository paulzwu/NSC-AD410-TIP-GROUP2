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
    var statsComplete, statsInProgress, statsNotStarted;

    $(document).ready(function() {
        initTable();
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
            case "outcome":
                text = document.getElementById("learnOutcome").value;
                if (text != "" && isDuplicate() == false && tagCounter < 5) {
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
        filter = "";
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
                    var dataTable = [];
                    for (i = 0; i < data.length; i++) {
                        var date = data[i].time_complete;
                        var shared = data[i].Share;
                        if (date != null){
                            date = date.substring(0,4);
                            alert(date);
                        }
                        if (shared != null){
                            shared = shared.substring(0,3);
                            alert(shared);
                        }
                        dataTable.push([data[i].name, date, data[i].Division, data[i].complete, shared]);
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
                {data: 2, title: 'Department'},
                {data: 3, title: 'Status'},
                {
                    data: 4, title: 'View/Export',
                    "render": function (data, type) {
                        if (type === 'display') {
                            data = '<a href="tip.php" target="_blank">View</a>';
                        }

                        return data;
                    }
                }
            ]
        });
    }
</script>
<script src="assets/js/report_export.js"></script>




</body>
</html>
