$(document).ready(function() {

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
                //options for progress bar - top, bottom, none
                survey.showProgressBar = "top"; survey.render();
                // use this for custom messages after survey completed; if no text provided, uses default message
                survey.completedHtml = ""; survey.render();
                // when set to false, prevents the after survey message from displaying
                survey.showCompletedPage = true; survey.render();
                // displays a custom complete message
                //survey.completedHtml = surveyComplete; survey.render();
                //---- SAVE ANSWERS FUNCTION ----\\
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
      }
      console.log("survey ID: " + docID);
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
