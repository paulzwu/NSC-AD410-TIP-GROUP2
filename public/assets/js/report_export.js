
    var isDateRange = false;
    var startDate = '';
    var endDate = '';
    var academicYear = '';
    var exportType = 'PDF';
    var includeDataViz = false;


    // Report Request Handler (Queues Modal from Toolbar)
    function previewReport(){
        var element = this;
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
                window.open(result, '_blank');
                console.log('Result: '+ result);
            }
        };
        console.log('Date: '+ "startDate=" + startDate + ", endDate=" + endDate);
        xhr.send("id=exportReport&startDate=" + startDate + "&endDate=" + endDate + "&exportType=" + exportType);
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
