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
  showOptions: false,
  // controls which question types are displayed in editor
  questionTypes : ["text", "checkbox", "radiogroup", "dropdown", "comment"]
  };
// pass the editorOptions into the constructor. It is an optional parameter.
  var survey = new SurveyEditor.SurveyEditor("surveyEditorContainer", editorOptions);
  // instead of just removing all json, it also loads this json string after
  // clearing out the previous json string
  survey.text = "{\"pages\":[{\"name\":\"page1\",\"elements\":[{\"type\":\"radiogroup\",\"isRequired\":\"true\",\"name\":\"requiredQuestion1\",\"title\":\"What is your Division?\",\"choices\":[\"AHSS\",\"BEIT\",\"BTS\",\"HHS\",\"LIB\",\"M&S\"]},{\"type\":\"text\",\"isRequired\":\"true\",\"name\":\"requiredQuestion2\",\"title\":\"Course Prefix\"},{\"type\":\"text\",\"isRequired\":\"true\",\"name\":\"requiredQuestion3\",\"title\":\"Course Number\"},{\"type\":\"radiogroup\",\"isRequired\":\"true\",\"name\":\"requiredQuestion4\",\"title\":\"TIP data will be shared de-identified and in aggregate. TIPs are NOT an evaluation of your teaching. It is useful to campus-wide assessment and professional development to use specifics of individual TIPs.\",\"choices\":[\"Yes, you may use my specifics to share with colleagues\",\"No, I would rather not share any specifics\"]}]}]}";
  //--- this block uses jquery to append the save, load and new buttons to the div used ---\\
  //--- by survey js. this makes integration of these features look seamless ---\\
    $navBarHack = $(".navbar-default.container-fluid.nav.nav-tabs.svd_menu");
  // these lines create the buttons and place them in the same 'div' as the rest of
  // the buttons and tabs in the original editor
    $navBarHack.append(
        "<button type=\"button\" class=\"btn btn-primary\" id=\"loadSurvey\" data-toggle=\"modal\" data-target=\"#loadBox\" data-backdrop=\"static\">Load</button>" +
        "<button type=\"button\" class=\"btn btn-primary\" id=\"saveSurvey\" data-toggle=\"modal\" data-target=\"#saveBox\" data-backdrop=\"static\">Save</button>" +
        "<button type=\"button\" class=\"btn btn-primary\" id=\"newSurvey\">Clear Form</button>" +
        "<button type=\"button\" class=\"btn btn-primary\" id=\"loadTIP\" data-toggle=\"modal\" data-target=\"#tipBox\" data-backdrop=\"static\">Set Current TIP</button>" +
        "<div class=\"modal fade\" id=\"loadBox\" role=\"dialog\">" +
            "<div class=\"modal-dialog\">" +
                "<div class=\"modal-content\">" +
                    "<div class=\"modal-header\">" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>" +
                        "<h4 class=\"modal-title\">Load or Delete</h4>" +
                    "</div>" +
                    "<div class=\"modal-body\">" +
                        "<div class=\"list-group\" id=\"surveyNames\"></div>" +
                    "</div>" +
                    "<div class=\"modal-footer\">" +
                        "<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\" id=\"load\">Load</button>" +
                        "<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\" id=\"delete\">Delete</button>" +
                        "<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\" id=\"cancelLoad\">Cancel</button>" +
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
        "</div>" +
        "<div class=\"modal fade\" id=\"tipBox\" role=\"dialog\">" +
            "<div class=\"modal-dialog\">" +
                "<div class=\"modal-content\">" +
                    "<div class=\"modal-header\">" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>" +
                        "<h4 class=\"modal-title\">Set default TIP</h4>" +
                    "</div>" +
                    "<div class=\"modal-body\">" +
                        "<div id=\"deploy\"></div>" +
                    "</div>" +
                    "<div class=\"modal-footer\">" +
                        "<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\" id=\"tipCurrent\">Set Current</button>" +
                        "<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\" id=\"tipCancel\">Cancel</button>" +
                    "</div>" +
                "</div>" +
            "</div>" +
        "</div>" +
        "<div id=\"snackbar\"></div>"
    );

$(document).ready(function() {
    //------------ load survey ------------\\
    //request the JSON data and parse into the select element
    $('#loadSurvey').on('click', function() {
      var docID;
      loadNames('#surveyNames');
      console.log("load clicked");
      $('#loadBox').on('click', '#pass-data', function() {
        console.log("Survey name clicked");
          docID = $(this).attr('data-id');
          if (docID == 0) {
            console.log("no data");
          } else {
            console.log("survey ID: " + docID);
          }
      });
      // when load is clicked, pass the surveyID to the server and return survey json
      $("#load").one('click', function() {
          console.log("modal load clicked");
          $.ajax({url: 'survey_load.php',
              data: {'ID':docID},
              type: 'POST',
              success:function(result) {
              // survey.text loads quiz data into surveyjs editor
                survey.text=result;
                console.log("survey loaded");
                snackBar("Survey loaded");
              },
              error:function() {
                console.log("no survey to load");
                snackBar("No survey to load");
              }
          });
      });
      $("#delete").one('click', function() {
        $.ajax({ url: 'survey_ids.php',
           dataType:'JSON',
           success:function(data) {
             $.each(data.surveyInfo, function(key, val) {
               if(docID == val.surveyID && val.currentTIP == '1') {
                 console.log("current tip cannot be deleted");
                 snackBar("The current TIP cannot be deleted.");
                 return false;
               } else if (docID == val.surveyID && val.currentTIP == '0') {
                 $.ajax({url: 'survey_delete.php',
                     data: {'ID':docID},
                     type: 'POST',
                     success:function(result) {
                       console.log("survey " + docID + " deleted");
                       snackBar("Survey deleted");
                     },
                     error:function() {
                       console.log("no survey to delete");
                       snackBar("No survey to delete");
                     }
                 });
               }
             })
           },
           error:function() {
             console.log("error getting currentTIP and surveyID");
             snackBar("Unable to delete TIP at this time");
           }
         });
      });
    });

    //------------ save survey ------------\\
    $('#saveSurvey').on('click', function() {
      // when save button pressed,
      $("#save").one('click', function() {
        // right now, names do not have to be unique - TODO: enforce unique quiz names
        var nameOfSurvey = $('input[name=surveyName1]').val();
        var jsonSurvey = survey.text;
        // if no name given, data not saved
        if (nameOfSurvey == null || !nameOfSurvey.replace(/\s/g, '').length) {
            snackBar("No name given, survey not saved");
            console.log("No name, save canceled")
        } else {
            // survey json and name saved to db
            $.ajax({url: 'survey_save.php', data: {'saveData':jsonSurvey, 'saveName':nameOfSurvey}, type: 'POST',
                        success: console.log("json data sent to server") });

            snackBar("This survey has been saved as " + nameOfSurvey);
            $('#test').children('input').val('')
        }
      });
      $("#cancelSave").one('click', function() {
        $('#test').children('input').val('')
        snackBar("Save canceled");
        console.log("User canceled save")
      });

      $('#saveBox').on('hidden.bs.modal', function (e) {
        $(this)
          .find("input,textarea,select")
             .val('')
             .end()
          .find("input[type=checkbox], input[type=radio]")
             .prop("checked", "")
             .end();
      })
    });

    //------------ new survey ------------\\
    $("#newSurvey").on('click', function() {
      // instead of just removing all json, it also loads this json string after
      // clearing out the previous json string
      survey.text = "{\"pages\":[{\"name\":\"page1\",\"elements\":[{\"type\":\"radiogroup\",\"isRequired\":\"true\",\"name\":\"requiredQuestion1\",\"title\":\"What is your Division?\",\"choices\":[\"AHSS\",\"BEIT\",\"BTS\",\"HHS\",\"LIB\",\"M&S\"]},{\"type\":\"text\",\"isRequired\":\"true\",\"name\":\"requiredQuestion2\",\"title\":\"Course Prefix\"},{\"type\":\"text\",\"isRequired\":\"true\",\"name\":\"requiredQuestion3\",\"title\":\"Course Number\"},{\"type\":\"radiogroup\",\"isRequired\":\"true\",\"name\":\"requiredQuestion4\",\"title\":\"TIP data will be shared de-identified and in aggregate. TIPs are NOT an evaluation of your teaching. It is useful to campus-wide assessment and professional development to use specifics of individual TIPs.\",\"choices\":[\"Yes, you may use my specifics to share with colleagues\",\"No, I would rather not share any specifics\"]}]}]}";
      console.log("json data cleared");
      snackBar("Survey cleared");
    });

    // renames tip editor tabs
    $(".svd_container .svd_menu a").each(function() {
        var text = $(this).text();
        text = text.replace("Survey Designer", "Tip Editor");
        text = text.replace("Test Survey", "Preview Tip");
        $(this).text(text);
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
            $.each(data.surveyInfo, function(key, val) {
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

    function snackBar(text) {
      $('#snackbar').empty();
      var x = document.getElementById("snackbar")
      x.className = "show";
      $("#snackbar").append(text);
      setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
    }

    var currentTIP;
    var newTIP;
    function loadTIPnames(id){
      // call to server to load quiz names
      $select = $(id);
      $.ajax({
        url: 'survey_ids.php',
        dataType:'JSON',
        success:function(data){
          //clear the current content of the select
          $select.html('');
          // render survey names into modal
          $.each(data.surveyInfo, function(key, val) {
            //report to user if db empty (no data in table)
            if (val.surveyID == '0') {
              $select.append('<div class=\"radio\"><label id=\"tipSelection\"><input type=\"radio\" name=\"optradio\" value=\"0\">No surveys saved</label></div>');
              console.log("no items to display");
              //iterate over the data and create a list of buttons with data values to pass to load function
              // if val.currentTIP is 1 meaning that it is the current tip, that tip will be selected by default
            } else if (val.currentTIP == '1') {
              $select.append('<div class=\"radio\"><label class=\"active\" id=\"tipSelection\"><input type=\"radio\" name=\"optradio\" value=\"' + val.surveyID + '\" checked=\"\">' + val.surveyName + '</label></div>');
              console.log("TIP #" + val.surveyID + ", '" + val.surveyName + "' is the current default survey")
              currentTIP = val.surveyID;
              //console.log("currentTIP is " + currentTIP);
              // otherwise it will not be selected
            } else {
              $select.append('<div class=\"radio\"><label id=\"tipSelection\"><input type=\"radio\" name=\"optradio\" value=\"' + val.surveyID + '\">' + val.surveyName + '</label></div>');
            }
          })
        },
        error:function(){
          $select.html('');
          //report to user if there is an error (db file missing)
          $select.append('<div class=\"radio\"><label id=\"tipSelection\"><input type=\"radio\" name=\"optradio\" value=\"-1\">Database not available</label></div>');
          console.log("database file not found");
        }
      });
    }
//------ SET DEFAULT TIP ----\\
// this code allows admins to set a default tip for everyone to answer
    $('#loadTIP').on('click', function() {
      console.log("tip loader clicked");
      loadTIPnames('#deploy');
      console.log("list created");
        // gets surveyID of currently selected survey
        $('#tipBox').on('click', '#tipSelection', function() {
          newTIP = $('input[name=optradio]:checked').val();
          //console.log("newTIP is " + newTIP);
          if (newTIP == 0) {
            console.log("no data");
          }
        });
        // save selected tip as default
        $("#tipCurrent").one('click', function() {
          console.log("currentTIP = " + currentTIP + ", newTIP = " + newTIP);
          $.ajax({url: 'set_default_tip.php',
              data: {'ID':newTIP, 'oldID':currentTIP},
              type: 'POST',
              success:function() {
                console.log("db updated");
                snackBar("Current TIP selected");
              },
              error:function() {
                console.log("no survey to load");
                snackBar("No survey to load");
            }
          });
        });
      });
    });
