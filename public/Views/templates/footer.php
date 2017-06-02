
    <!-- Footer-->
    <footer style="clear:both; min-height:200px; background-color:#18bc9c;color:#fff;text-align:center;padding-top:50px;">
        © 2017 ADBAS PROGRAM | NORTH SEATTLE COLLEGE
    </footer>
    </div>


    <!--   Core JS Files   -->
    <script src="assets/js/lib/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.jqueryui.min.js"></script>
<!--    <script src="assets/js/lib/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>-->

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose
    <script src="assets/js/light-bootstrap-dashboard.js"></script>
    <script src="assets/js/responsive_nav.js"></script> -->

    <!-- Response Rate Assets -->
   <script src="assets/js/lib/raphael-2.1.4.min.js"></script>
    <script src="assets/js/lib/justgage.js"></script>
    <script src="assets/js/tipprogress.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.3.0/knockout-min.js"></script>
	    <script src="https://surveyjs.azureedge.net/0.12.9/survey.ko.min.js"></script>
	    <script src="https://surveyjs.azureedge.net/0.12.9/surveyeditor.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.0/ace.min.js" type="text/javascript"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.0/worker-json.js" type="text/javascript"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.0/mode-json.js" type="text/javascript"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js" type="text/javascript"></script>
    <script>
    			$(document).ready(function() {

			//$("div.panel-footer").append("<button type=\"button\" class=\"btn btn-primary\" id=\"loadSurvey\" data-toggle=\"modal\" data-target=\"#loadBox\" data-backdrop=\"static\">Load</button>");

				//------------ load survey ------------\\
				//request the JSON data and parse into the select element
				$('#loadSurvey').one('click', function() {
					loadNames('#surveyNames');
					// when load is clicked, pass the surveyID to the server and return survey json
					 $(document).on('click', 'button#pass-data', function(){
             var docID = $(this).attr('data-id');
  						if (docID == 0) {
  						console.log("no data");
  						} else {
                $("#loadBtn").click(function() {
  								 $.ajax({url: 'survey_load.php',
  										data: {'ID':docID},
  										type: 'POST',
  										success:function(result) {
											// custom complete message; displays a button for showing answers after the quiz is over
											//var surveyComplete = "<h3 style=\"text-align:center;\">Thank you for completing the survey!</h3>";
											Survey.defaultBootstrapCss.navigationButton = "btn btn-primary";
											Survey.Survey.cssType = "bootstrap";
											var survey = new Survey.Model(result, "container");
											//var survey = new Survey.Model(result, "container");
											//options for progress bar - top, bottom, none
											survey.showProgressBar = "top"; survey.render();
											// use this for custom messages after survey completed; if no text provided, uses default message
											survey.completedHtml = ""; survey.render();
											// when set to false, prevents the after survey message from displaying
											survey.showCompletedPage = true; survey.render();
											// displays a custom complete message
											//survey.completedHtml = surveyComplete; survey.render();
											// gathers survey answer data and does something with it
											survey.onComplete.add(function (sender) {
												var mySurvey = sender;
												var surveyData = JSON.stringify(sender.data);
												$.ajax({url: 'save_answers.php',
														dataType: 'json',
														data: {'Responses':surveyData},
														type: 'POST',
														async: true})
												console.log("JSON data sent to server")
											});
  											console.log("survey loaded");
  										},
                      error:function() {
  											console.log("no survey to load");
  										}
								});
              });
            });
          });
        });


				// used to load a list of survey names into the load and overwrite modal boxes
				function loadNames(id){
					$select = $(id);
					// call to server to load quiz names
					$.ajax({
						url: 'survey_ids.php',
						dataType:'JSON',
						success:function(data){
							//clear the current content of the select
							$select.html('');
							$.each(data.surveyInfo, function(key, val){
								//report to user if db empty (no data in table)
								if (val.surveyID == '0') {
									$select.append('<button type=\"button\" id=\"pass-data\" class=\"list-group-item list-group-item-action\" data-id=\"0">No surveys saved.</button>');
									console.log("no items to display");
								} else {
									//iterate over the data and create a list of buttons with data values to pass to load function
									$select.append('<button type=\"button\" id=\"pass-data\" class=\"list-group-item list-group-item-action\" data-id=\"' + val.surveyID + '\">' + val.surveyName + '</button>');
								}
							})
							console.log("survey menu created");
						},
						error:function(){
							$select.html('');
							//report to user if there is an error (db file missing)
							$select.append('<button type=\"button\" id=\"pass-data\" class=\"list-group-item list-group-item-action\" data-id=\"-1\">Database not available.</button>');
							console.log("database file not found");
						}
					});
				}
			});
    </script>

<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.jqueryui.min.js"></script>
<script>
var complete = 0;

    $(document).ready(function() {
        $('#table_id').DataTable({
            "processing" : true,
            "ajax" : {
                url : "movies.json",
                dataSrc : function(data) {
                    var dataTable = [];
                    for (i = 0; i < data.length; i++) {
                        dataTable.push([data[i].name, data[i].course, data[i].department, data[i].status, data[i].view_export]);
                        if (dataTable[i][3] == "Complete"){complete++}
                    }
                    //alert("Total complete: " + complete);
                    return dataTable
                }
            },

            columns: [
                { data: 0, title: 'Name'},
                { data: 1, title: 'Course'},
                { data: 2, title: 'Department'},
                { data: 3, title: 'Status'},
                { data: 4, title: 'View/Export',
                    "render": function(data, type){
                        if(type === 'display'){
                            data = '<a href="' + data + '" target="_blank">' + data + '</a>';
                        }

                        return data;
                    }}
            ]
        });
    });
</script>

</body>





</html>
