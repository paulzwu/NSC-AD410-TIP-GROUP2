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
		
	</body>
</html>
