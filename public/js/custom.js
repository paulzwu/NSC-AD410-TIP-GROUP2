var facultyTIPS = [
    ["2017/04/25", "Completed", "Click to View"],
    ["2011/04/25", "In Progress", "https://www.youtube.com/watch?v=RCKBtsTk8eQ"],
    ["2011/04/25", "Completed", "Click to View"],
    ["2011/04/25", "Completed", "Click to View"],
    ["2011/04/25", "Completed", "Click to View"],
    ["2011/04/25", "Completed", "Click to View"],
    ["2011/04/25", "Completed", "Click to View"],
    ["2011/04/25", "Completed", "Click to View"],
    ["2011/04/25", "Completed", "Click to View"],
    ["2011/04/25", "Completed", "Click to View"],
    ["2011/04/25", "Completed", "Click to View"],
    ["2011/04/25", "Completed", "Click to View"],
    ["2011/04/25", "Completed", "Click to View"],
    ["2011/04/25", "Completed", "Click to View"],
    ["2011/04/25", "Completed", "Click to View"],
    ["2011/04/25", "Completed", "Click to View"],
    ["2011/04/25", "Completed", "Click to View"],
    ["2011/04/25", "Completed", "Click to View"]
];

$(document).ready(function() {
    $('#facultyTIP').DataTable({
        data: facultyTIPS,
        columns: [{
                title: "Date of TIP"
            },
            {
                title: "Status"
            },
            {
                title: "Continue or View "
            }
        ],
        "aoColumnDefs": [{
            "sTitle": "Site name",
            "aTargets": ["site_name"]
        }, {
            "aTargets": [2],
            "bSortable": true,
            "mRender": function(url, type, full) {
                return '<a href="' + url + '" + target="_blank">' + "LINK" + '</a>';
            }
        }, ]
    });
});


var sharedTIPS = [
    ["AB", "310", "Go-Go Nuts", "LINK"],
    ["AD", "112", "Sam Hyde", "LINK"],
    ["ACCT", "121", "Pineapple Man", "LINK"],
    ["IT", "212", "Sweezy", "LINK"],
    ["BUS", "555", "Peanut Arbuckle", "LINK"],
    ["AB", "310", "Go-Go Nuts", "LINK"],
    ["AD", "112", "Sam Hyde", "LINK"],
    ["ACCT", "121", "Pineapple Man", "LINK"],
    ["IT", "212", "Sweezy", "LINK"],
    ["BUS", "555", "Peanut Arbuckle", "LINK"],
    ["AB", "310", "Go-Go Nuts", "LINK"],
    ["AD", "112", "Sam Hyde", "LINK"],
    ["ACCT", "121", "Pineapple Man", "LINK"],
    ["IT", "212", "Sweezy", "LINK"],
    ["BUS", "555", "Peanut Arbuckle", "LINK"],
    ["AB", "310", "Go-Go Nuts", "LINK"],
    ["AD", "112", "Sam Hyde", "LINK"],
    ["ACCT", "121", "Pineapple Man", "LINK"],
    ["IT", "212", "Sweezy", "LINK"],
    ["BUS", "555", "Peanut Arbuckle", "LINK"]
];

$(document).ready(function() {
    $('#sharedTIP').DataTable({
        data: sharedTIPS,
        columns: [{
                title: "Department"
            },
            {
                title: "Course"
            },
            {
                title: "Faculty Name"
            },
            {
                title: "Link to TIP"
            }
        ],
		 "aoColumnDefs": [{
            "sTitle": "Site name",
            "aTargets": ["site_name"]
        }, {
            "aTargets": [3],
            "bSortable": true,
            "mRender": function(url, type, full) {
                return '<a href="' + url + '" + target="_blank">' + "LINK" + '</a>';
            }
        }, ]
    });
});