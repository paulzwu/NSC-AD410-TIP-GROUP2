//------------ editor options ------------\\
// show the JSON text editor tab. It is shown by default
//var editorOptions = { showJSONEditorTab: false, };
  var editorOptions = {
  // show the embeded survey tab. It is hidden by default
  showEmbededSurveyTab: false,
  // show the test survey tab. It is shown by default
  showTestSurveyTab: true,
  // show the JSON text editor tab. It is shown by default
  showJSONEditorTab: false,
  // show the "Options" button menu. It is hidden by default
  showOptions: false
  };
// pass the editorOptions into the constructor. It is an optional parameter.
  var survey = new SurveyEditor.SurveyEditor("surveyEditorContainer", editorOptions);
  //--- this block uses jquery to append the save, load and new buttons to the div used ---\\
  //--- by survey js. this makes integration of these features look seamless ---\\
    $navBarHack = $(".navbar-default.container-fluid.nav.nav-tabs.svd_menu");
  // these lines create the buttons and place them in the same 'div' as the rest of
  // the buttons and tabs in the original editor
    $navBarHack.append(
        "<button type=\"button\" class=\"btn btn-primary\" id=\"loadSurvey\" data-toggle=\"modal\" data-target=\"#loadBox\" data-backdrop=\"static\">Load</button>" +
        "<button type=\"button\" class=\"btn btn-primary\" id=\"saveSurvey\" data-toggle=\"modal\" data-target=\"#saveBox\" data-backdrop=\"static\">Save</button>" +
        "<button type=\"button\" class=\"btn btn-primary\" id=\"newSurvey\">Clear Form</button>" +

        "<div class=\"modal fade\" id=\"loadBox\" role=\"dialog\">" +
            "<div class=\"modal-dialog\">" +
                "<div class=\"modal-content\">" +
                    "<div class=\"modal-header\">" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>" +
                        "<h4 class=\"modal-title\">Load</h4>" +
                    "</div>" +
                    "<div class=\"modal-body\">" +
                        "<div class=\"list-group\" id=\"surveyNames\"></div>" +
                    "</div>" +
                    "<div class=\"modal-footer\">" +
                        "<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\" id=\"load\">Load</button>" +
                        "<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\" id=\"cancelLoad\">Cancel</button>" +
                        "<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\" id=\"delete\">Delete</button>" +
                    "</div>" +
                "</div>" +
            "</div>" +
        "</div>" +
        "<div class=\"modal fade\" id=\"saveBox\" role=\"dialog\">" +
            "<div class=\"modal-dialog\">" +
                "<div class=\"modal-content\">" +
                    "<div class=\"modal-header\">" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>" +
                        "<h4 class=\"modal-title\">Save</h4>" +
                    "</div>" +
                    "<div class=\"modal-body\">" +
                        "<br><form id=\"test\">New survey name: <input type=\"text\" name=\"surveyName1\"></form>" +
                    "</div>" +
                    "<div class=\"modal-footer\">" +
                        "<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\" id=\"save\">Save</button>" +
                        "<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\" id=\"cancelSave\">Cancel</button>" +
                    "</div>" +
                "</div>" +
            "</div>" +
        "</div>"
    );

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
          console.log("survey ID: " + docID);
          $("#load").click(function() {
              $.ajax({url: 'survey_load.php',
                  data: {'ID':docID},
                  type: 'POST',
                  success:function(result) {
                  // survey.text loads quiz data into surveyjs editor
                    survey.text=result;
                    console.log("survey loaded");
                  },
                  error:function() {
                    console.log("no survey to load");
                  }
              });
          });
          $("#delete").click(function() {
            $.ajax({url: 'survey_delete.php',
                data: {'ID':docID},
                type: 'POST',
                success:function(result) {
                  console.log("survey " + docID + " deleted");
                }
            });
          });
        }
    });
  });

  //------------ save survey ------------\\
  $('#saveSurvey').one('click', function() {
    // when save button pressed,
    $("#save").click(function() {
      // right now, names do not have to be unique - TODO: enforce unique quiz names
      var nameOfSurvey = $('input[name=surveyName1]').val();
      var jsonSurvey = survey.text;
      // if no name given, data not saved
      if (nameOfSurvey == null || !nameOfSurvey.replace(/\s/g, '').length) {
          alert("No name given. Survey not saved.");
          console.log("Save canceled")
      } else {
          // survey json and name saved to db
          $.ajax({url: 'survey_save.php', data: {'saveData':jsonSurvey, 'saveName':nameOfSurvey}, type: 'POST',
                      success: console.log("json data sent to server") });

          alert("This survey has been saved.");
          $('#test').children('input').val('')
      }
    });
    $("#cancelSave").click(function(){
      $('#test').children('input').val('')
    });
  });

  //------------ new survey ------------\\
  $("#newSurvey").click(function() {
    // removes all json data, effectively resetting the survey editor
    survey.text = '';
    console.log("json data cleared");
  });

  // renames tip editor tabs
  $(".svd_container .svd_menu a").each(function() {
      var text = $(this).text();
      text = text.replace("Survey Designer", "Tip Editor");
      text = text.replace("Test Survey", "Preview Tip");
      $(this).text(text);
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
