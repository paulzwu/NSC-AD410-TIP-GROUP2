<!DOCTYPE html>
    <html>
	<head>
	    <link href="http://getbootstrap.com/dist/css/bootstrap.css" type="text/css" rel="stylesheet" />
	    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.3.0/knockout-min.js"></script>
	    <link href="https://surveyjs.azureedge.net/0.12.9/surveyeditor.css" type="text/css" rel="stylesheet" />
	    <script src="https://surveyjs.azureedge.net/0.12.9/survey.ko.min.js"></script>
	    <script src="https://surveyjs.azureedge.net/0.12.9/surveyeditor.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.0/ace.min.js" type="text/javascript"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.0/worker-json.js" type="text/javascript"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.0/mode-json.js" type="text/javascript"></script>
	    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" type="text/css" rel="stylesheet" />
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js" type="text/javascript"></script>
	</head>
	<body>
	    <div id="surveyEditorContainer"></div>
	    <script>
		var editorOptions = {
		   // show the embeded survey tab. It is hidden by default
		   showEmbededSurveyTab: true,
                   // show the test survey tab. It is shown by default
                   showTestSurveyTab: true,
                   // show the JSON text editor tab. It is shown by default
                   showJSONEditorTab: true,
                   // show the "Options" button menu. It is hidden by default
                   showOptions: true
		};

                // pass the ebove ditorOptions var to the constructor. It is an optional parameter.
                var survey = new SurveyEditor.SurveyEditor("surveyEditorContainer", editorOptions);

		// calls the save function below
		//set function on save callback
		//survey.saveSurveyFunc = saveMySurvey;

		// need to add to this save function so it will write the survey json object to database
		//function saveMySurvey(){
		//  var yourNewSurveyJSON = survey.text;
		//  send updated json in your storage  
		//  save the survey JSON
		//  var jsonEl = document.getElementById('surveyJSON');
		//  jsonEl.value = survey.text;
		//}
		
		// example of loading static data to editor
		// we need to create a load function that will pull json information from a saved survey
		// into the editor using jquery ajax
		//survey.text = "{ pages: [{ name:\'page1\', questions: [{ type: \'text\', name:\"q1\"}]}]}";
		//survey.text = yourSurveyJSON;

		//survey.loadSurvey(yourSurveyId);

	    </script>
	</body>
    </html>
