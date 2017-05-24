
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
					"<button type=\"button\" class=\"btn btn-primary\" id=\"loadSurvey\">Load Survey</button>"
				);

				// //------------ load survey names ------------\\
				//get a reference to the select element
				$select = $('#stored_surveys');
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
					      // $select.append('<option value="' + val.surveyID + '">' + val.surveyName + '</option>');
					      $select.append('<li><a href="' + val.surveyID + '">' + val.surveyName + '</a></li>');
					      
					    })
							console.log("Survey menu created");
					  },
					  error:function(){
					    //if there is an error append a 'none available' option
					    $select.html('<li><a href="#">no surveys available</a></li>');
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
