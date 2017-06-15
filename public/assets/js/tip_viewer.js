$(document).ready(function() {
  // userID is obtained thru session variable on server (via the php file)
  $.ajax({url: 'get_default_tip.php',
      type: 'POST',
      success:function(result) {
        try {
          var parsed_json = JSON.parse(result);
          console.log("json parsed correctly");
        } catch (e) {
          console.log("error: " + e);
        }
        if (parsed_json.complete == 1) {
          $("#container").empty();
          $("#container").append("You have already completed this TIP assessment.");
        } else {
          $(".tip-title").append("<button type=\"button\" class=\"btn btn-primary\" id=\"quickSave\">Quick Save</button>");
          Survey.defaultBootstrapCss.navigationButton = "btn btn-primary";
          Survey.Survey.cssType = "bootstrap";
          //console.log(parsed_json.surveyJSON);
          var survey = new Survey.Model(JSON.parse(parsed_json.surveyJSON), "container");
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
          console.log(parsed_json.answerJSON);
          if (result != null) {
            survey.data = JSON.parse(parsed_json.answerJSON);
          }
          //---- FINAL SAVE FUNCTION ----\\
          survey.onComplete.add(function (sender) {
            var mySurvey = sender;
            var surveyData = JSON.stringify(sender.data);
            console.log(surveyData);
            $.ajax({url: 'save_answers.php',
                dataType: 'json',
                data: {'Responses':surveyData, 'Complete':'1'},
                type: 'POST',
                async: true})
            console.log("complete: JSON data sent to server")
          });

          //---- QUICK SAVE FUNCTION ----\\

          $('#quickSave').on('click', function () {
            var surveyData = JSON.stringify(survey.data);
            $.ajax({url: 'save_answers.php',
                dataType: 'json',
                data: {'Responses':surveyData, 'Complete':'0'},
                type: 'POST',
                async: true})
            console.log("quicksave: JSON data sent to server")
            snackBar("Answers saved - Quiz incomplete");
          });

          console.log("survey loaded");
          }

          function snackBar(text) {
            $('#snackbar').empty();
            var x = document.getElementById("snackbar")
            x.className = "show";
            $("#snackbar").append(text);
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
          }
        },
        error:function() {
          console.log("no survey to load");
       }
      })
  });
