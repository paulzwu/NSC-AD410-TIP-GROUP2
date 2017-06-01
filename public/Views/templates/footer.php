
    <!-- Footer-->
    <footer style="clear:both; min-height:200px; background-color:#18bc9c;color:#fff;text-align:center;padding-top:50px;">
        © 2017 ADBAS PROGRAM | NORTH SEATTLE COLLEGE
    </footer>
    </div>


    <!--   Core JS Files   -->
<!--    <script src="assets/js/lib/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>-->

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="assets/js/light-bootstrap-dashboard.js"></script>
    <script src="assets/js/responsive_nav.js"></script>

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
				<!-- $('#loadSurvey').one('click', function() { -->
					<!-- loadNames('#surveyNames'); -->
					<!-- // when load is clicked, pass the surveyID to the server and return survey json -->
					<!-- $(document).on('click', 'button#pass-data', function(){ -->
						<!-- var docID = $(this).attr('data-id'); -->
						<!-- if (docID == 0) { -->
							<!-- console.log("no data"); -->
						<!-- } else { -->
							<!-- $("#loadBtn").click(function() { -->
								<!-- $.ajax({url: 'survey_load.php', -->
										<!-- data: {'ID':docID}, -->
										<!-- type: 'POST', -->
										<!-- success:function(result) { -->
											// custom complete message; displays a button for showing answers after the quiz is over
											//var surveyComplete = "<h3 style=\"text-align:center;\">Thank you for completing the survey!</h3>";
											Survey.defaultBootstrapCss.navigationButton = "btn btn-primary";
											Survey.Survey.cssType = "bootstrap";
											var survey = new Survey.Model({ "pages": [ { "elements": [ { "type": "radiogroup", "choices": [ "AHSS", "BEIT", "BTS", "HHS", "LIB", "M&S" ], "name": "question1", "title": "What is your division?" } ], "name": "page1" }, { "elements": [ { "type": "text", "name": "question2", "title": "Course Prefix" }, { "type": "text", "name": "question3", "title": "Course Number" } ], "name": "page2" }, { "elements": [ { "type": "radiogroup", "choices": [ "Winter 2015", "Spring 2015", "Summer 2015", "Fall 2015", "Winter 2016", "Spring 2016", "Summer 2016", "Fall 2016", "Winter 2016", "Spring 2016", "Summer 2016" ], "name": "question4", "title": "Quarter Year" } ], "name": "page3" }, { "elements": [ { "type": "comment", "name": "question5", "title": "If this is a group TIP, please list all faculty participating. Thank you!" } ], "name": "page4" }, { "elements": [ { "type": "comment", "name": "question6", "title": "What is the problem or lesson that you identified and will be discussing in this TIP? No topic is too big or too small. All are welcomed!" } ], "name": "page5" }, { "elements": [ { "type": "comment", "name": "question7", "title": "What is the course-level objective that this TIP best addresses?" } ], "name": "page6" }, { "elements": [ { "type": "radiogroup", "choices": [ "Facts, theories, perspectives, and methodologies within and across disciplines", "Critical thinking and problem solving", "Communication and self-expression", "Quantitative reasoning", "Information literacy", "Technological proficiency", "Collaboration: group and team work", "Civic engagement: local, global, and environmental", "Intercultural knowledge and competence", "Ethical awareness and personal integrity", "Lifelong learning and personal well-being", "Synthesis and application of knowledge, skills, and responsibilities to new settings and problems" ], "name": "question8", "title": "Which of the college-wide Essential Learning Outcomes does your TIP most closely address?" } ], "name": "page7" }, { "elements": [ { "type": "radiogroup", "choices": [ "Direct student feedback (e.g. written or verbal communication with students, SGID, etc.)", "Student behavior (e.g. length of time to complete a learning activity, number of clarifying questions the students asked, etc.)", "Student performance on a learning activity, assignment, a quiz or exam, a skill demonstration, oral presentation, etc." ], "name": "question9", "title": "Which of the following best describes the evidence you found for the problem." } ], "name": "page8" }, { "elements": [ { "type": "comment", "name": "question10", "rows": "6", "title": "Please describe more specifically how you identified the problem. For example, \"Based on discussion posts, I realized that more than half of the class did not understand the prompt and was not demonstrating the kind of comprehension I was looking for.\"" } ], "name": "page9" }, { "elements": [ { "type": "radiogroup", "choices": [ "Modified a learning activity", "Added new learning activity", "Provided more context or more practice", "Provided “real world” examples or applications", "Tried a new approach to the material", "Reapportioned time/effort devoted to topics", "Reviewed the material" ], "name": "question11", "title": "Please select the change that best fits what you did to try to address the problem." } ], "name": "page10" }, { "elements": [ { "type": "comment", "name": "question12", "rows": "6", "title": "Specifically, what did you do to address the problem? For example, \"I broke the prompt down into two separate discussions so that it was clearer what the students should think about and write about in their posts.\"" } ], "name": "page11" }, { "elements": [ { "type": "radiogroup", "choices": [ "Direct student feedback (e.g. written or verbal communication with students, SGID, etc.)", "Student behavior behavior (e.g. length of time to complete a learning, activity, number of clarifying questions the students asked, etc.)", "Student performance on a learning activity, assignment, a quiz or exam, a skill demonstration, oral presentation, etc." ], "name": "question13", "title": "Please select the evidence that best fits how you assessed the impact of the change you made." } ], "name": "page12" }, { "elements": [ { "type": "comment", "name": "question14", "title": "Please describe more fully how you assessed the impact of the change you made. For example, \"After I broke the prompt into two discussions, more students were able to write about the ideas thoroughly. This time it was about 75% of students. I might want to refine the prompts even further, but this was a good change.\"" } ], "name": "page13" }, { "elements": [ { "type": "radiogroup", "choices": [ "Gave you an idea for additional changes to this course", "Gave you an idea for changes to another course", "Suggested a topic for discussion with colleagues in your program/discipline", "Suggested a topic that an interdisciplinary group of faculty could productively examine", "Prompted consideration of a sabbatical for more in-depth study", "Uncovered a topic for a faculty retreat" ], "name": "question15", "title": "What new opportunities did you consider as a result of identifying this problem and making this change?" } ], "name": "page14" }, { "elements": [ { "type": "comment", "name": "question16", "title": "What else would you like to share about the teaching improvement process you engaged in this quarter?" } ], "name": "page15" }, { "elements": [ { "type": "radiogroup", "choices": [ "Yes, you may use my specifics to share with colleagues", "No, I would rather not share any specifics" ], "name": "question17", "title": "TIP data will be shared de-identified and in aggregate. TIPs are NOT an evaluation of your teaching. It is useful to campus-wide assessment and professional development to use specifics of individual TIPs." } ], "name": "page16" }, { "elements": [ { "type": "html", "html": "<p>Thank you for your TIP!</p>\n\n<p>The Canvas system automatically saves information as you fill out this form. You may return to it at any time before choosing \"Submit.\"</p>\n\n<p>If you are not yet done, simply log out of Canvas or shut down your browser. Your information will be saved.</p>\n\n<p>DO NOT CHOOSE SUBMIT until you have completed your TIP.</p>", "name": "question18" } ], "name": "page17" } ]}, "container");
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
										
										// survey.text loads quiz data into surveyjs editor
											//survey.text=result;
											<!-- console.log("survey loaded"); -->
										<!-- }, -->
										<!-- error:function() { -->
											<!-- console.log("no survey to load"); -->
										<!-- } -->
								//});
							//});
						//}
						//console.log("survey ID: " + docID);
					//});
				//});
				
				
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

    $(document).ready(function() {
        $('#table_id').DataTable({
            "processing" : true,
            "ajax" : {
                url : "movies.json",
                dataSrc : function(data) {
                    var dataTable = [];
                    for (i = 0; i < data.length; i++) {
                        dataTable.push([data[i].movie, data[i].year, data[i].url]);

                    }
                    return dataTable
                }
            },

            columns: [
                { data: 0, title: 'Movie'},
                { data: 1, title: 'Year'},
                { data: 2, title: 'Link',
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