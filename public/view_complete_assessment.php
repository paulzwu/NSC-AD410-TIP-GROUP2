<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Completed Assessment</title>
</head>
<body>
<!-- Main Content -->
<div class="content responses-content" id="widget">
    <div class="container-fluid" id="no">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                <div class="card">
                    <div class="header">
                        <h2 class="title">TIP Submission Rates</h2>
                        <h4 id="totalSubmissions"></h4>
                    </div>
                <button id="btnSave" type="submit" class="btn btn-success header" onclick="saveAsCSV()">Download Data as CSV</button>
            </div>
                        <p></p>
                        <hr>
                    </div>
                    </div>
                </div>
            </div>
        <div id="completedTIP"></div>
</body>
<?php
include 'Views/templates/footer.php'
?>
</html>

<script src="assets/js/lib/jquery-3.2.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        createTable();
    });

    function saveAsCSV() {
	    var xhr = new XMLHttpRequest();
	    xhr.open('POST', 'complete_assessment_export.php', true);
	    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    	xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
	    xhr.onreadystatechange = function(){
	        if(xhr.readyState == 4 && xhr.status == 200){
	        	var result = xhr.responseText;
                window.open(result, '_blank');
	        }
	    };
	    xhr.send("data=" + completeAssessmentJSON);
	}
</script>
