
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
<script src="assets/js/lib/raphael-2.1.4.min.js"></script>
<script src="assets/js/lib/justgage.js"></script>
<script src="assets/js/tipprogress.js"></script>
<script src="assets/js/light-bootstrap-dashboard.js"></script>
<script src="assets/js/responsive_nav.js"></script>


<!-- Response Rate Assets -->
<script>
    var statsComplete = 0, statsInProgress = 0, statsNotStarted = 0;
    $(document).ready(function() {
        $('#table_id').DataTable({
            "processing": true,
            "ajax": {
                url: "movies.json",
                dataSrc: function (data) {
                    var dataTable = [];
                    for (i = 0; i < data.length; i++) {
                        dataTable.push([data[i].name, data[i].course, data[i].department, data[i].status, data[i].view_export]);
                        if (dataTable[i][3] == "Complete") {
                            statsComplete++
                        } else if (dataTable[i][3] == "In-Progress"){
                            statsInProgress++
                        } else if (dataTable[i][3] == "Not Started"){
                            statsNotStarted++
                        }
                    }
                    // update dashboard gauges
                    complete.refresh(statsComplete);
                    inprogress.refresh(statsInProgress);
                    notstarted.refresh(statsNotStarted);

                    return dataTable
                }
            },

            columns: [
                {data: 0, title: 'Name'},
                {data: 1, title: 'Course'},
                {data: 2, title: 'Department'},
                {data: 3, title: 'Status'},
                {
                    data: 4, title: 'View/Export',
                    "render": function (data, type) {
                        if (type === 'display') {
                            data = '<a href="' + data + '" target="_blank">' + data + '</a>';
                        }

                        return data;
                    }
                }
            ]
        });
         });
         </script>
    
<script>
        var isDateRange = false;
          var startDate = '';
          var endDate = '';
          var academicYear = '';
          var exportType = '';
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
            if(document.activeElement == dateRangeSelectors.item(0)|| document.activeElement == dateRangeSelectors.item(0)){
                isDateRange = true;
                academicYearSelector.disabled=true;
                dateRangeSelectors.item(0).disabled=false;
                dateRangeSelectors.item(1).disabled=false;
                if(document.activeElement == dateRangeSelectors.item(0)) {
                    startDate = document.getElementById('startDate').value;
                    console.log(startDate);
                } else if(document.activeElement == dateRangeSelectors.item(1)) {
                    endDate = document.getElementById('startDate').value;
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
                console.log('Result: '+ result);
                // var obj = JSON.parse(result);
                // document.getElementById("modalHeader").innerHTML = obj.modalHeader;
                // document.getElementById("modalDescription").innerHTML = obj.modalDescription;
                // $('#reportModal').modal({'show' : true});
              }
            };
            xhr.send("startDate=" + startDate + ", endDate=" + endDate, + ", ");
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
</script>
      

           

</body>
</html>
