var facultyTIPS = [
    [ "2017/04/25", "Completed", "Continue"],
    [ "2011/04/25", "Completed", "Click to View"],
    [ "2011/04/25", "Completed", "Click to View"],
    [ "2011/04/25", "Completed", "Click to View"],
    [ "2011/04/25", "Completed", "Click to View"],
    [ "2011/04/25", "Completed", "Click to View"],
    [ "2011/04/25", "Completed", "Click to View"],
    [ "2011/04/25", "Completed", "Click to View"],
    [ "2011/04/25", "Completed", "Click to View"],
    [ "2011/04/25", "Completed", "Click to View"],
    [ "2011/04/25", "Completed", "Click to View"],
    [ "2011/04/25", "Completed", "Click to View"],
    [ "2011/04/25", "Completed", "Click to View"],
    [ "2011/04/25", "Completed", "Click to View"],
    [ "2011/04/25", "Completed", "Click to View"],
    [ "2011/04/25", "Completed", "Click to View"],
    [ "2011/04/25", "Completed", "Click to View"],
    [ "2011/04/25", "Completed", "Click to View"]
];
 
$(document).ready(function() {
    $('#facultyTIP').DataTable( {
        data: facultyTIPS,
        columns: [
            { title: "Date of TIP" },
            { title: "Status" },
            { title: "Continue or View " }
        ]
    } );
} );

var sharedTIPS = [
    [ "AB", "310", "Go-Go Nuts", "LINK"],
    [ "AD", "112", "Sam Hyde", "LINK"],
    [ "ACCT", "121", "Pineapple Man", "LINK"],
    [ "IT", "212", "Sweezy", "LINK"],
    [ "BUS", "555", "Peanut Arbuckle", "LINK"],
    [ "AB", "310", "Go-Go Nuts", "LINK"],
    [ "AD", "112", "Sam Hyde", "LINK"],
    [ "ACCT", "121", "Pineapple Man", "LINK"],
    [ "IT", "212", "Sweezy", "LINK"],
    [ "BUS", "555", "Peanut Arbuckle", "LINK"],
    [ "AB", "310", "Go-Go Nuts", "LINK"],
    [ "AD", "112", "Sam Hyde", "LINK"],
    [ "ACCT", "121", "Pineapple Man", "LINK"],
    [ "IT", "212", "Sweezy", "LINK"],
    [ "BUS", "555", "Peanut Arbuckle", "LINK"],
    [ "AB", "310", "Go-Go Nuts", "LINK"],
    [ "AD", "112", "Sam Hyde", "LINK"],
    [ "ACCT", "121", "Pineapple Man", "LINK"],
    [ "IT", "212", "Sweezy", "LINK"],
    [ "BUS", "555", "Peanut Arbuckle", "LINK"]
];
 
$(document).ready(function() {
    $('#sharedTIP').DataTable( {
        data: sharedTIPS,
        columns: [
            { title: "Department" },
            { title: "Course" },
            { title: "Faculty Name" },
			{ title: "Link to TIP" }
        ]
    } );
} );