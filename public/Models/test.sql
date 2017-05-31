PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;
CREATE TABLE "Surveys" (
	`surveyID`	INTEGER PRIMARY KEY AUTOINCREMENT,
	`jsonData`	TEXT,
	`surveyName`	TEXT
);
INSERT INTO "Surveys" VALUES(1,'{ "pages": [ { "elements": [ { "type": "radiogroup", "choices": [ "AHSS", "BEIT", "BTS", "HHS", "LIB", "M&S" ], "name": "question1", "title": "What is your division?" } ], "name": "page1" }, { "elements": [ { "type": "text", "name": "question2", "title": "Course Prefix" }, { "type": "text", "name": "question3", "title": "Course Number" } ], "name": "page2" }, { "elements": [ { "type": "radiogroup", "choices": [ "Winter 2015", "Spring 2015", "Summer 2015", "Fall 2015", "Winter 2016", "Spring 2016", "Summer 2016", "Fall 2016", "Winter 2016", "Spring 2016", "Summer 2016" ], "name": "question4", "title": "Quarter Year" } ], "name": "page3" }, { "elements": [ { "type": "comment", "name": "question5", "title": "If this is a group TIP, please list all faculty participating. Thank you!" } ], "name": "page4" }, { "elements": [ { "type": "comment", "name": "question6", "title": "What is the problem or lesson that you identified and will be discussing in this TIP? No topic is too big or too small. All are welcomed!" } ], "name": "page5" }, { "elements": [ { "type": "comment", "name": "question7", "title": "What is the course-level objective that this TIP best addresses?" } ], "name": "page6" }, { "elements": [ { "type": "radiogroup", "choices": [ "Facts, theories, perspectives, and methodologies within and across disciplines", "Critical thinking and problem solving", "Communication and self-expression", "Quantitative reasoning", "Information literacy", "Technological proficiency", "Collaboration: group and team work", "Civic engagement: local, global, and environmental", "Intercultural knowledge and competence", "Ethical awareness and personal integrity", "Lifelong learning and personal well-being", "Synthesis and application of knowledge, skills, and responsibilities to new settings and problems" ], "name": "question8", "title": "Which of the college-wide Essential Learning Outcomes does your TIP most closely address?" } ], "name": "page7" }, { "elements": [ { "type": "radiogroup", "choices": [ "Direct student feedback (e.g. written or verbal communication with students, SGID, etc.)", "Student behavior (e.g. length of time to complete a learning activity, number of clarifying questions the students asked, etc.)", "Student performance on a learning activity, assignment, a quiz or exam, a skill demonstration, oral presentation, etc." ], "name": "question9", "title": "Which of the following best describes the evidence you found for the problem." } ], "name": "page8" }, { "elements": [ { "type": "comment", "name": "question10", "rows": "6", "title": "Please describe more specifically how you identified the problem. For example, \"Based on discussion posts, I realized that more than half of the class did not understand the prompt and was not demonstrating the kind of comprehension I was looking for.\"" } ], "name": "page9" }, { "elements": [ { "type": "radiogroup", "choices": [ "Modified a learning activity", "Added new learning activity", "Provided more context or more practice", "Provided “real world” examples or applications", "Tried a new approach to the material", "Reapportioned time/effort devoted to topics", "Reviewed the material" ], "name": "question11", "title": "Please select the change that best fits what you did to try to address the problem." } ], "name": "page10" }, { "elements": [ { "type": "comment", "name": "question12", "rows": "6", "title": "Specifically, what did you do to address the problem? For example, \"I broke the prompt down into two separate discussions so that it was clearer what the students should think about and write about in their posts.\"" } ], "name": "page11" }, { "elements": [ { "type": "radiogroup", "choices": [ "Direct student feedback (e.g. written or verbal communication with students, SGID, etc.)", "Student behavior behavior (e.g. length of time to complete a learning, activity, number of clarifying questions the students asked, etc.)", "Student performance on a learning activity, assignment, a quiz or exam, a skill demonstration, oral presentation, etc." ], "name": "question13", "title": "Please select the evidence that best fits how you assessed the impact of the change you made." } ], "name": "page12" }, { "elements": [ { "type": "comment", "name": "question14", "title": "Please describe more fully how you assessed the impact of the change you made. For example, \"After I broke the prompt into two discussions, more students were able to write about the ideas thoroughly. This time it was about 75% of students. I might want to refine the prompts even further, but this was a good change.\"" } ], "name": "page13" }, { "elements": [ { "type": "radiogroup", "choices": [ "Gave you an idea for additional changes to this course", "Gave you an idea for changes to another course", "Suggested a topic for discussion with colleagues in your program/discipline", "Suggested a topic that an interdisciplinary group of faculty could productively examine", "Prompted consideration of a sabbatical for more in-depth study", "Uncovered a topic for a faculty retreat" ], "name": "question15", "title": "What new opportunities did you consider as a result of identifying this problem and making this change?" } ], "name": "page14" }, { "elements": [ { "type": "comment", "name": "question16", "title": "What else would you like to share about the teaching improvement process you engaged in this quarter?" } ], "name": "page15" }, { "elements": [ { "type": "radiogroup", "choices": [ "Yes, you may use my specifics to share with colleagues", "No, I would rather not share any specifics" ], "name": "question17", "title": "TIP data will be shared de-identified and in aggregate. TIPs are NOT an evaluation of your teaching. It is useful to campus-wide assessment and professional development to use specifics of individual TIPs." } ], "name": "page16" }, { "elements": [ { "type": "html", "html": "<p>Thank you for your TIP!</p>\n\n<p>The Canvas system automatically saves information as you fill out this form. You may return to it at any time before choosing \"Submit.\"</p>\n\n<p>If you are not yet done, simply log out of Canvas or shut down your browser. Your information will be saved.</p>\n\n<p>DO NOT CHOOSE SUBMIT until you have completed your TIP.</p>", "name": "question18" } ], "name": "page17" } ]}','NewSurvey1');
INSERT INTO "Surveys" VALUES(2,'{"pages":[{"name":"page1","elements":[{"type":"text","name":"question1","placeHolder":"First and Last Name","title":"Please enter your full name in the box."}]}]}','Name Survey 1');
INSERT INTO "Surveys" VALUES(3,'{"pages": [{"name": "page1","elements": [{"type": "text","name": "question1","placeHolder": "First and last name","title": "Please enter your name below."}]}]}','Name Survey 2');
INSERT INTO "Surveys" VALUES(4,'{ "title":"Software developer survey", "pages":[{ "title":"What operating system do you use?", "questions":[{ "type":"checkbox", "name":"opSystem", "title":"OS", "hasOther":true, "isRequired":true, "choices":["Windows", "Linux", "Macintosh OSX"]}]},{ "title":"What language(s) are you currently using?", "questions":[{ "type":"checkbox", "name":"langs", "title":"Plese select from the list", "colCount":4, "isRequired":true, "choices":["Javascript", "Java", "Python", "CSS", "PHP", "Ruby", "C++", "C", "Shell", "C#", "Objective-C", "R", "VimL", "Go", "Perl", "CoffeeScript", "TeX", "Swift", "Scala", "Emacs List", "Haskell", "Lua", "Clojure", "Matlab", "Arduino", "Makefile", "Groovy", "Puppet", "Rust", "PowerShell"]}]},{ "title":"Please enter your name and e-mail", "questions":[{ "type":"text", "name":"name", "title":"Your name:"},{ "type":"text", "name":"email", "title":"Your e-mail"}]}]}','Tech Survey 1');
INSERT INTO "Surveys" VALUES(5,'{ "pages": [ { "elements": [ { "type": "radiogroup", "choices": [ "AHSS", "BEIT", "BTS", "HHS", "LIB", "M&S" ], "name": "question1", "title": "What is your division?" }, { "type": "text", "name": "question2", "title": "Course Prefix" }, { "type": "text", "name": "question3", "title": "Course Number" }, { "type": "radiogroup", "choices": [ "Winter 2015", "Spring 2015", "Summer 2015", "Fall 2015", "Winter 2016", "Spring 2016", "Summer 2016", "Fall 2016", "Winter 2016", "Spring 2016", "Summer 2016" ], "name": "question4", "title": "Quarter Year" }, { "type": "comment", "name": "question5", "title": "If this is a group TIP, please list all faculty participating. Thank you!" }, { "type": "comment", "name": "question6", "title": "What is the problem or lesson that you identified and will be discussing in this TIP? No topic is too big or too small. All are welcomed!" }, { "type": "comment", "name": "question7", "title": "What is the course-level objective that this TIP best addresses?" }, { "type": "radiogroup", "choices": [ "Facts, theories, perspectives, and methodologies within and across disciplines", "Critical thinking and problem solving", "Communication and self-expression", "Quantitative reasoning", "Information literacy", "Technological proficiency", "Collaboration: group and team work", "Civic engagement: local, global, and environmental", "Intercultural knowledge and competence", "Ethical awareness and personal integrity", "Lifelong learning and personal well-being", "Synthesis and application of knowledge, skills, and responsibilities to new settings and problems" ], "name": "question8", "title": "Which of the college-wide Essential Learning Outcomes does your TIP most closely address?" }, { "type": "radiogroup", "choices": [ "Direct student feedback (e.g. written or verbal communication with students, SGID, etc.)", "Student behavior (e.g. length of time to complete a learning activity, number of clarifying questions the students asked, etc.)", "Student performance on a learning activity, assignment, a quiz or exam, a skill demonstration, oral presentation, etc." ], "name": "question9", "title": "Which of the following best describes the evidence you found for the problem." }, { "type": "comment", "name": "question10", "rows": "6", "title": "Please describe more specifically how you identified the problem. For example, \"Based on discussion posts, I realized that more than half of the class did not understand the prompt and was not demonstrating the kind of comprehension I was looking for.\"" }, { "type": "radiogroup", "choices": [ "Modified a learning activity", "Added new learning activity", "Provided more context or more practice", "Provided “real world” examples or applications", "Tried a new approach to the material", "Reapportioned time/effort devoted to topics", "Reviewed the material" ], "name": "question11", "title": "Please select the change that best fits what you did to try to address the problem." }, { "type": "comment", "name": "question12", "rows": "6", "title": "Specifically, what did you do to address the problem? For example, \"I broke the prompt down into two separate discussions so that it was clearer what the students should think about and write about in their posts.\"" }, { "type": "radiogroup", "choices": [ "Direct student feedback (e.g. written or verbal communication with students, SGID, etc.)", "Student behavior behavior (e.g. length of time to complete a learning, activity, number of clarifying questions the students asked, etc.)", "Student performance on a learning activity, assignment, a quiz or exam, a skill demonstration, oral presentation, etc." ], "name": "question13", "title": "Please select the evidence that best fits how you assessed the impact of the change you made." }, { "type": "comment", "name": "question14", "title": "Please describe more fully how you assessed the impact of the change you made. For example, \"After I broke the prompt into two discussions, more students were able to write about the ideas thoroughly. This time it was about 75% of students. I might want to refine the prompts even further, but this was a good change.\"" }, { "type": "radiogroup", "choices": [ "Gave you an idea for additional changes to this course", "Gave you an idea for changes to another course", "Suggested a topic for discussion with colleagues in your program/discipline", "Suggested a topic that an interdisciplinary group of faculty could productively examine", "Prompted consideration of a sabbatical for more in-depth study", "Uncovered a topic for a faculty retreat" ], "name": "question15", "title": "What new opportunities did you consider as a result of identifying this problem and making this change?" }, { "type": "comment", "name": "question16", "title": "What else would you like to share about the teaching improvement process you engaged in this quarter?" }, { "type": "radiogroup", "choices": [ "Yes, you may use my specifics to share with colleagues", "No, I would rather not share any specifics" ], "name": "question17", "title": "TIP data will be shared de-identified and in aggregate. TIPs are NOT an evaluation of your teaching. It is useful to campus-wide assessment and professional development to use specifics of individual TIPs." }, { "type": "html", "html": "<p>Thank you for your TIP!</p>\n\n<p>The Canvas system automatically saves information as you fill out this form. You may return to it at any time before choosing \"Submit.\"</p>\n\n<p>If you are not yet done, simply log out of Canvas or shut down your browser. Your information will be saved.</p>\n\n<p>DO NOT CHOOSE SUBMIT until you have completed your TIP.</p>", "name": "question18" } ], "name": "page1" } ]}','TIP Survey 2015-2016');
INSERT INTO "Surveys" VALUES(6,'{
 pages: [
  {
   name: "page1",
   elements: [
    {
     type: "dropdown",
     choices: [
      {
       value: "1",
       text: "first item"
      },
      {
       value: "2",
       text: "second item"
      },
      {
       value: "3",
       text: "third item"
      }
     ],
     name: "question1"
    },
    {
     type: "checkbox",
     choices: [
      {
       value: "1",
       text: "first item"
      },
      {
       value: "2",
       text: "second item"
      },
      {
       value: "3",
       text: "third item"
      }
     ],
     name: "question2"
    },
    {
     type: "rating",
     name: "question3"
    }
   ]
  }
 ]
}','new test survey');
INSERT INTO "Surveys" VALUES(13,'{pages:[{name:"page1",questions:[{type:"text",name:"q1"}]}]}','test survey 1');
INSERT INTO "Surveys" VALUES(19,'{
 pages: [
  {
   name: "page1",
   elements: [
    {
     type: "radiogroup",
     name: "question1",
     title: "What is your division?",
     choices: [
      "AHSS",
      "BEIT",
      "BTS",
      "HHS",
      "LIB",
      "M&S"
     ]
    }
   ]
  },
  {
   name: "page2",
   elements: [
    {
     type: "text",
     name: "question2",
     title: "Course Prefix"
    },
    {
     type: "text",
     name: "question3",
     title: "Course Number"
    }
   ]
  },
  {
   name: "page3",
   elements: [
    {
     type: "radiogroup",
     name: "question4",
     title: "Quarter Year",
     choices: [
      "Winter 2015",
      "Spring 2015",
      "Summer 2015",
      "Fall 2015",
      "Winter 2016",
      "Spring 2016",
      "Summer 2016",
      "Fall 2016",
      "Winter 2016",
      "Spring 2016",
      "Summer 2016"
     ]
    }
   ]
  },
  {
   name: "page4",
   elements: [
    {
     type: "comment",
     name: "question5",
     title: "If this is a group TIP, please list all faculty participating. Thank you!"
    }
   ]
  },
  {
   name: "page5",
   elements: [
    {
     type: "comment",
     name: "question6",
     title: "What is the problem or lesson that you identified and will be discussing in this TIP? No topic is too big or too small. All are welcomed!"
    }
   ]
  },
  {
   name: "page6",
   elements: [
    {
     type: "comment",
     name: "question7",
     title: "What is the course-level objective that this TIP best addresses?"
    }
   ]
  },
  {
   name: "page7",
   elements: [
    {
     type: "radiogroup",
     name: "question8",
     title: "Which of the college-wide Essential Learning Outcomes does your TIP most closely address?",
     choices: [
      "Facts, theories, perspectives, and methodologies within and across disciplines",
      "Critical thinking and problem solving",
      "Communication and self-expression",
      "Quantitative reasoning",
      "Information literacy",
      "Technological proficiency",
      "Collaboration: group and team work",
      "Civic engagement: local, global, and environmental",
      "Intercultural knowledge and competence",
      "Ethical awareness and personal integrity",
      "Lifelong learning and personal well-being",
      "Synthesis and application of knowledge, skills, and responsibilities to new settings and problems"
     ]
    }
   ]
  },
  {
   name: "page8",
   elements: [
    {
     type: "radiogroup",
     name: "question9",
     title: "Which of the following best describes the evidence you found for the problem.",
     choices: [
      "Direct student feedback (e.g. written or verbal communication with students, SGID, etc.)",
      "Student behavior (e.g. length of time to complete a learning activity, number of clarifying questions the students asked, etc.)",
      "Student performance on a learning activity, assignment, a quiz or exam, a skill demonstration, oral presentation, etc."
     ]
    }
   ]
  },
  {
   name: "page9",
   elements: [
    {
     type: "comment",
     name: "question10",
     title: "Please describe more specifically how you identified the problem. For example, \"Based on discussion posts, I realized that more than half of the class did not understand the prompt and was not demonstrating the kind of comprehension I was looking for.\"",
     rows: "6"
    }
   ]
  },
  {
   name: "page10",
   elements: [
    {
     type: "radiogroup",
     name: "question11",
     title: "Please select the change that best fits what you did to try to address the problem.",
     choices: [
      "Modified a learning activity",
      "Added new learning activity",
      "Provided more context or more practice",
      "Provided “real world” examples or applications",
      "Tried a new approach to the material",
      "Reapportioned time/effort devoted to topics",
      "Reviewed the material"
     ]
    }
   ]
  },
  {
   name: "page11",
   elements: [
    {
     type: "comment",
     name: "question12",
     title: "Specifically, what did you do to address the problem? For example, \"I broke the prompt down into two separate discussions so that it was clearer what the students should think about and write about in their posts.\"",
     rows: "6"
    }
   ]
  },
  {
   name: "page12",
   elements: [
    {
     type: "radiogroup",
     name: "question13",
     title: "Please select the evidence that best fits how you assessed the impact of the change you made.",
     choices: [
      "Direct student feedback (e.g. written or verbal communication with students, SGID, etc.)",
      "Student behavior behavior (e.g. length of time to complete a learning, activity, number of clarifying questions the students asked, etc.)",
      "Student performance on a learning activity, assignment, a quiz or exam, a skill demonstration, oral presentation, etc."
     ]
    }
   ]
  },
  {
   name: "page13",
   elements: [
    {
     type: "comment",
     name: "question14",
     title: "Please describe more fully how you assessed the impact of the change you made. For example, \"After I broke the prompt into two discussions, more students were able to write about the ideas thoroughly. This time it was about 75% of students. I might want to refine the prompts even further, but this was a good change.\""
    }
   ]
  },
  {
   name: "page14",
   elements: [
    {
     type: "radiogroup",
     name: "question15",
     title: "What new opportunities did you consider as a result of identifying this problem and making this change?",
     choices: [
      "Gave you an idea for additional changes to this course",
      "Gave you an idea for changes to another course",
      "Suggested a topic for discussion with colleagues in your program/discipline",
      "Suggested a topic that an interdisciplinary group of faculty could productively examine",
      "Prompted consideration of a sabbatical for more in-depth study",
      "Uncovered a topic for a faculty retreat"
     ]
    }
   ]
  },
  {
   name: "page15",
   elements: [
    {
     type: "comment",
     name: "question16",
     title: "What else would you like to share about the teaching improvement process you engaged in this quarter?"
    }
   ]
  },
  {
   name: "page16",
   elements: [
    {
     type: "radiogroup",
     name: "question17",
     title: "TIP data will be shared de-identified and in aggregate. TIPs are NOT an evaluation of your teaching. It is useful to campus-wide assessment and professional development to use specifics of individual TIPs.",
     choices: [
      "Yes, you may use my specifics to share with colleagues",
      "No, I would rather not share any specifics"
     ]
    }
   ]
  },
  {
   name: "page17",
   elements: [
    {
     type: "html",
     name: "question18",
     html: "<p>Thank you for your TIP!</p>\n\n<p>The Canvas system automatically saves information as you fill out this form. You may return to it at any time before choosing \"Submit.\"</p>\n\n<p>If you are not yet done, simply log out of Canvas or shut down your browser. Your information will be saved.</p>\n\n<p>DO NOT CHOOSE SUBMIT until you have completed your TIP.</p>"
    }
   ]
  }
 ]
}','NewSurvey2');
INSERT INTO "Surveys" VALUES(22,'{
 pages: [
  {
   name: "page1",
   elements: [
    {
     type: "rating",
     name: "question1"
    },
    {
     type: "radiogroup",
     choices: [
      {
       value: "1",
       text: "first item"
      },
      {
       value: "2",
       text: "second item"
      },
      {
       value: "3",
       text: "third item"
      }
     ],
     name: "question2"
    },
    {
     type: "text",
     name: "question3"
    }
   ]
  }
 ]
}','test4');
INSERT INTO "Surveys" VALUES(23,'{
 pages: [
  {
   name: "page1",
   elements: [
    {
     type: "text",
     name: "question1"
    },
    {
     type: "checkbox",
     choices: [
      {
       value: "1",
       text: "first item"
      },
      {
       value: "2",
       text: "second item"
      },
      {
       value: "3",
       text: "third item"
      }
     ],
     name: "question2"
    },
    {
     type: "comment",
     name: "question3"
    },
    {
     type: "panel",
     name: "panel1"
    }
   ]
  }
 ]
}','test survey one');
DELETE FROM sqlite_sequence;
INSERT INTO "sqlite_sequence" VALUES('Surveys',23);
COMMIT;
