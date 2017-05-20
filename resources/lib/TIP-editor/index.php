<!DOCTYPE html>
<html>
	<head>
	    <link href="http://getbootstrap.com/dist/css/bootstrap.css" type="text/css" rel="stylesheet" />
	    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.3.0/knockout-min.js"></script>
	    <link href="https://surveyjs.azureedge.net/0.12.14/surveyeditor.css" type="text/css" rel="stylesheet" />
	    <script src="https://surveyjs.azureedge.net/0.12.14/survey.ko.min.js"></script>
	    <script src="https://surveyjs.azureedge.net/0.12.14/surveyeditor.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.0/ace.min.js" type="text/javascript"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.0/worker-json.js" type="text/javascript"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.0/mode-json.js" type="text/javascript"></script>
	    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" type="text/css" rel="stylesheet" />
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js" type="text/javascript"></script>
			<style>
				button#loadSurvey, button#newSurvey, button#saveSurvey {
					margin-right: 10px;
					font-size: 11px;
				}
				div#surveyNames {
					max-height: 250px;
					overflow-y:scroll;
				}
			</style>
	</head>
	<body>
		<div id="surveyEditorContainer"></div>
		<script>
				//------------ editor options ------------\\
				// show the JSON text editor tab. It is shown by default
				var editorOptions = { showJSONEditorTab: false, };
				// pass the editorOptions into the constructor. It is an optional parameter.
				var survey = new SurveyEditor.SurveyEditor("surveyEditorContainer", editorOptions);

				// this uses jquery to append the save, load and new buttons to the div used
				// by survey js. this makes integration of these features look seamless
				$navBarHack = $('.navbar-default.container-fluid.nav.nav-tabs.svd_menu');
				$navBarHack.append(
					"<button type=\"button\" class=\"btn btn-primary\" id=\"loadSurvey\" data-toggle=\"modal\" data-target=\"#loadDialog\" data-backdrop=\"static\">Load Survey</button>" +
					"<button type=\"button\" class=\"btn btn-primary\" id=\"saveSurvey\">Save Survey</button>" +
					"<button type=\"button\" class=\"btn btn-primary\" id=\"newSurvey\">New Survey</button>" +
					"<div class=\"modal fade\" id=\"loadDialog\" role=\"dialog\">" +
						"<div class=\"modal-dialog\">" +
							"<div class=\"modal-content\">" +
								"<div class=\"modal-header\">" +
									"<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>" +
									"<h4 class=\"modal-title\">Pick a survey</h4>" +
								"</div>" +
								"<div class=\"modal-body\">" +
									"<div class=\"list-group\" id=\"surveyNames\"></div>" +
								"</div>" +
								"<div class=\"modal-footer\">" +
									"<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\" id=\"loadSurvey1\">Load</button>" +
									"<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\" id=\"loadCanceled\">Cancel</button>" +
								"</div>" +
							"</div>" +
						"</div>" +
					"</div>"
				);
				$(document).ready(function() {
					$('#loadDialog').on('show.bs.modal', function() {
						//------------ load survey names ------------\\
						//get a reference to the select element
						$select = $("#surveyNames");
						//request the JSON data and parse into the select element
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
								$(document).on('click', 'button#pass-data', function(){
									var val = $(this).attr('data-id');
									if (val == 0) {
										console.log("no data");
									} else {
										surveyLoad(val);
									}
									console.log("survey ID: " + val);
								});
							},
							error:function(){
								$select.html('');
								//report to user if there is an error (db file missing)
								$select.append('<button type=\"button\" id=\"pass-data\" class=\"list-group-item list-group-item-action\" data-id=\"-1\">Database not available.</button>');
								console.log("database file not found");
							}
						});
					})
					//------------ load survey ------------\\
					function surveyLoad (docID) {
						$("#loadSurvey1").click(function() {
							// survey.text loads quiz data into surveyjs editor
							$.ajax({url: 'survey_load.php',
									data: {'ID':docID},
									type: 'POST',
									success:function(result) {
										survey.text=result;
										//$("#results").html(result);
										console.log("survey loaded");
									},
									error:function() {
										console.log("no survey to load");
									}
							});
						});
					}
					//------------ save survey ------------\\
					// include the ability to save over an existing survey
					$("#saveSurvey").click(function() {
						var nameOfSurvey = prompt("Please enter survey name:");
						var jsonSurvey = survey.text;
						// if no name given, data not saved
						if (nameOfSurvey == null || !nameOfSurvey.replace(/\s/g, '').length) {
							alert("No name given. Survey not saved.");
							console.log("Save canceled")
						} else {
							// survey json and name saved to db
							$.ajax({url: 'survey_save.php', data: {'saveData':jsonSurvey, 'saveName':nameOfSurvey}, type: 'POST',
											success: console.log("JSON data sent to server") });
							loadDropdown();
						}
					});
					// add a delete function
					//------------ new survey ------------\\
					$("#newSurvey").click(function() {
						// removes all json data, effectively resetting the survey editor
						survey.text = '';
						console.log("New survey created");
					});
				});
		</script>
	</body>
</html>
