$(document).ready(function() {
  $.ajax({url: 'get_default_tip.php',
      type: 'POST',
      success:function(result) {
        Survey.defaultBootstrapCss.navigationButton = "btn btn-primary";
        Survey.Survey.cssType = "bootstrap";
        var survey = new Survey.Model(JSON.parse(result), "container");
        //options for progress bar - top, bottom, none
        survey.showProgressBar = "top"; survey.render();
        // use this for custom messages after survey completed; if no text provided, uses default message
        survey.completedHtml = ""; survey.render();
        // when set to false, prevents the after survey message from displaying
        survey.showCompletedPage = true; survey.render();

        // custom complete message; displays a button for showing answers after the quiz is over
        //var surveyComplete = "<h3 style=\"text-align:center;\">Thank you for completing the survey!</h3>";
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
