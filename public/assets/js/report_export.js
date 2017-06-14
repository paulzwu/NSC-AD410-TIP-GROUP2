var isDateRange = false;
var startDate = '';
var endDate = '';
var academicYear = '';
// var exportType = 'PDF';
// var vz = false;

//Variables for submissions rates by department
var currentDepartments = new Array();
var currentDepartmentResponseCount = new Array();
var deptTotal = new Array();

//variables for submission stats (in-progress / complete / not started)
//what each index represents:
//0 = total submissions
//1 = in-progress
//2 = complete
//3 = not started
var submissionStats = new Array();
var vizYa;

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


// function exportKind() {
//     if(document.getElementById("exportType").selectedIndex == '0') {
//         exportType = 'PDF';
//     } else if (document.getElementById("exportType").selectedIndex == '1'){
//         exportType = 'CSV';
//     }
//     // console.log(exportType);
//     return exportType;
// }

// function includeViz() {
//     if(document.getElementById("includeDataViz").checked == true)  {
//         vz = true;
//     } else if (document.getElementById("includeDataViz").checked== false){
//         vz = false;
//     }
//     // console.log(vz);
//     return vz;
// }

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
    var requestedReport = document.getElementById("modalHeader").innerHTML;
    requestedReport = requestedReport.replace(/\s+/g, '');
    // var exportType = exportKind();
    // vizYa = includeViz();
    // console.log(vizYa);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'report_preview.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            var result = xhr.responseText;
            console.log('Result: '+ result);
            var obj = JSON.parse(result);
            if(requestedReport == 'TIPSubmissionStats') {
                // if(vizYa = 'false') {
                //     window.open(result, '_blank');
                // } else {
                    
                    openTipCompletionReport(obj);
                // }
            } else if (requestedReport == 'TIPParticipationRateByDepartment') {
                // if(vizYa == 'false') {
                //     window.open(result, '_blank');
                // } else {
                    // var obj = JSON.parse(result);
                    openDivisionResponseRateChart(obj);
                // }
                
            } else if(requestedReport == 'TrendingTopics'){

            } else if(requestedReport == 'LearningOutcomesbyDivision'){}
            
        }
    };
    console.log('Date: '+ "startDate=" + startDate + ", endDate=" + endDate);
    xhr.send("id=exportReport&startDate=" + startDate + "&endDate=" + endDate + "&reportType=" + requestedReport);
}

function sendDataToChart(id, data, fileURL) {
    var xhr = new XMLHttpRequest();
    // xhr.open('POST', 'Views/Reports/tip_completion_by_division.php', true);
    xhr.open('POST', fileURL, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            window.open(fileURL);
        }
    };
    xhr.send("id=" + id + "&data=" + data);
}

function openDivisionResponseRateChart(responseObject){
    //Get current Departments from Active Survey
            // obj = JSON.parse(responseObject);
            dept = responseObject["departments"];
            deptObj = JSON.parse(dept);
            surveyObj = JSON.parse(deptObj[0].surveyJSON);
            pageObj = surveyObj["pages"];
            departments = pageObj[0].elements[0].choices;
            for (i in departments) {
                currentDepartments.push(departments[i]);
                currentDepartmentResponseCount.push(0);
            }
            
            //Get total current TIP Submissions
            submissionTotal = responseObject["submissionTotal"];
            sTotalObj = JSON.parse(submissionTotal);
            console.log(sTotalObj[0]["count(*)"]);

            //Get Department Submissions Totals
            ans = responseObject["submissionsByDept"];
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
            // deptTotal.push({"label": 'vz', "value":vizYa});
            var dt = JSON.stringify(deptTotal);
            var chartData = encodeURIComponent(dt); //encodes special characters
            console.log(chartData);
            sendDataToChart('chartData', chartData, 'Views/Reports/tip_completion_by_division.php');
}

function openTipCompletionReport(responseObject) {
    console.log(responseObject);

    //gets total tip submissions
    subm = responseObject["submissionTotal"];
    submObj = JSON.parse(subm);
    console.log(submObj[0]["count(*)"]);
    submissionStats.push({"totalSubmissions": submObj[0]["count(*)"]});

    //gets in-progress total
    ip = responseObject["inProgress"];
    ipObj = JSON.parse(ip);
    console.log(ipObj[0]["count(*)"]);
    submissionStats.push({"statsInProgress": ipObj[0]["count(*)"]});

    //gets complete total
    c = responseObject["complete"];
    cObj = JSON.parse(c);
    console.log(cObj[0]["count(*)"]);
    submissionStats.push({"statsComplete": cObj[0]["count(*)"]});

    //gets not-started total
    ns = responseObject["notStarted"];
    nsObj = JSON.parse(ns);
    console.log(nsObj[0]["count(*)"]);
    submissionStats.push({"statsNotStarted": nsObj[0]["count(*)"]});
    // submissionStats.push({"vz": vizYa});

    var completionStats = JSON.stringify(submissionStats);
    var submissionChartData = encodeURIComponent(completionStats); //encodes special characters
    console.log(submissionChartData);
    sendDataToChart('submissionChartData', submissionChartData, 'Views/Reports/tip_completion_report.php');

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


