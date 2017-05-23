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
				button#loadSurvey, button#newSurvey, button#saveSurvey, select#surveyNames {
					float: right;
					margin-right: 10px;
					font-size: 11px;
				}
				select#surveyNames {
					width:200px;
				}
			</style>
	</head>
	<body onload="loadDropdown()">
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
					"<button type=\"button\" class=\"btn btn-primary\" id=\"saveSurvey\">Save Survey</button>" +
					"<button type=\"button\" class=\"btn btn-primary\" id=\"newSurvey\">New Survey</button>" +
					"<button type=\"button\" class=\"btn btn-primary\" id=\"loadSurvey\">Load Survey</button>" +
					"<select id=\"surveyNames\"></select>"
				);

				//------------ load survey names ------------\\
				//get a reference to the select element
				$select = $('#surveyNames');
				//request the JSON data and parse into the select element
				function loadDropdown() {
					$.ajax({
					  url: 'survey_ids.php',
					  dataType:'JSON',
					  success:function(data){
					    //clear the current content of the select
					    $select.html('');
					    //iterate over the data and append a select option
					    $.each(data.surveyInfo, function(key, val){
					      $select.append('<option value="' + val.surveyID + '">' + val.surveyName + '</option>');
					    })
							console.log("Survey menu created");
					  },
					  error:function(){
					    //if there is an error append a 'none available' option
					    $select.html('<option id="-1">none available</option>');
							console.log("No survey names loaded, menu not created");
					  }
					});
				}
				$(document).ready(function() {
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

					//------------ load survey ------------\\
					$("#loadSurvey").click(function() {
						// survey.text loads quiz data into surveyjs editor
						$.ajax({url: 'survey_load.php',
									  data: {'ID':$('#surveyNames').val()},
										type: 'POST',
							success: function(result) {
										survey.text=result;
										console.log("Survey loaded");
							}
						});
					});
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
