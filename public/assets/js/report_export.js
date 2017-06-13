
    var isDateRange = false;
    var startDate = '';
    var endDate = '';
    var academicYear = '';
    var exportType = 'PDF';
    var includeDataViz = false;

    //Variables for submissions rates by department
    var currentDepartments = new Array();
    var currentDepartmentResponseCount = new Array();
    var deptTotal = new Array();


    // Report Request Handler (Queues Modal from Toolbar)
    function previewReport(){
        var element = this;
        console.log(element.id);
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'report_preview.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.onreadystatechange = function(){
            if(xhr.readyState == 4 && xhr.status == 200){
                var result = xhr.responseText;
                console.log('Result: '+ result);
                var obj = JSON.parse(result);
                document.getElementById("modalHeader").innerHTML = obj.modalHeader;
                document.getElementById("modalDescription").innerHTML = obj.modalDescription;
                document.getElementById("academicYear").innerHTML = obj.academicYears;

                $('#reportModal').modal({'show' : true});
            }
        };
        xhr.send("id=" + element.id + 'Modal');
    }


    function exportKind() {
        if(document.getElementById("exportType").selectedIndex == '0') {
            exportType = 'PDF';
        } else if (document.getElementById("exportType").selectedIndex == '1'){
            exportType = 'CSV';
        }
        console.log(exportType);
    }

    function includeViz() {
        if(document.getElementById("includeDataViz").checked == true)  {
            includeDataViz = true;
        } else if (document.getElementById("includeDataViz").checked== false){
            includeDataViz = false;
        }
    }

    function getSelectedRange(){
        var dateRangeSelectors = document.getElementsByClassName("dateRange");
        var academicYearSelector = document.getElementById("academicYear");
        if(document.activeElement == dateRangeSelectors.item(0)|| document.activeElement == dateRangeSelectors.item(1)){
            isDateRange = true;
            academicYearSelector.disabled=true;
            dateRangeSelectors.item(0).disabled=false;
            dateRangeSelectors.item(1).disabled=false;
            if(document.activeElement == dateRangeSelectors.item(0)) {
                startDate = document.getElementById('startDate').value;
                console.log("Start Date: " + startDate);
            } else {
                endDate = document.getElementById('endDate').value;
                console.log("End Date: " + endDate);
            }
        }
    }

    function clearReportFields() {
        var dateRangeSelectors = document.getElementsByClassName("dateRange");
        var academicYearSelector = document.getElementById("academicYear");
        academicYearSelector.disabled=false;
        dateRangeSelectors.item(0).value='';
        dateRangeSelectors.item(1).value='';
        dateRangeSelectors.item(0).disabled=false;
        dateRangeSelectors.item(1).disabled=false;
        isDateRange = false;
        startDate = '';
        endDate = '';
        var exportType = '';
        var includeDataViz = '';
        var academicYear = '';
    }


    function exportReport(){
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'report_preview.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.onreadystatechange = function(){
            if(xhr.readyState == 4 && xhr.status == 200){
                var result = xhr.responseText;
                obj = JSON.parse(result);
                console.log(obj);

                //Get current Departments from Active Survey
                dept = obj["departments"];
                deptObj = JSON.parse(dept);
                surveyObj = JSON.parse(deptObj[0].surveyJSON);
                pageObj = surveyObj["pages"];
                departments = pageObj[0].elements[0].choices;
                for (i in departments) {
                    currentDepartments.push(departments[i]);
                    currentDepartmentResponseCount.push(0);
                }
                
                //Get total current TIP Submissions
                submissionTotal = obj["submissionTotal"];
                sTotalObj = JSON.parse(submissionTotal);
                console.log(sTotalObj[0]["count(*)"]);

                //Get Department Submissions Totals
                ans = obj["submissionsByDept"];
                ansObj = JSON.parse(ans);
                for(i in ansObj){
                    console.log(ansObj[i].answerID);
                    jsonResponse = JSON.parse(ansObj[i].answerJSON);
                    ansDept = jsonResponse["requiredQuestion1"];
                    for(j in currentDepartments) {
                        if(ansDept == currentDepartments[j]){
                            currentDepartmentResponseCount[j]++;
                        }
                    }
                }

                //Create JSON array to Pass to Data Viz Chart
                for (i in currentDepartmentResponseCount) {
                    deptTotal.push({"label": currentDepartments[i],
                                    "value": currentDepartmentResponseCount[i]
                              });
                }
                var dt = JSON.stringify(deptTotal);
                console.log(dt);
                var w = window.open('Views/Reports/tip_completion_by_division');
            }
        };
        console.log('Date: '+ "startDate=" + startDate + ", endDate=" + endDate);
        xhr.send("id=exportReport&startDate=" + startDate + "&endDate=" + endDate + "&exportType=" + exportType);
    }

    function displayDeptResponse(dept) {

    }


    //adds event listeners to the reports drop-down in the toolbar
    var buttons = document.getElementsByClassName("previewReport");
    for(i = 0; i < buttons.length; i++){
        buttons.item(i).addEventListener("click", previewReport);
    }



    //disables date range selectors to eliminate bad query parameters
    function disable() {
        document.getElementById("mySelect").disabled=true;
    }
    function enable() {
        document.getElementById("mySelect").disabled=false;
    }


