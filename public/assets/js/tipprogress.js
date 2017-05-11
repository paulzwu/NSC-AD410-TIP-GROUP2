document.addEventListener("DOMContentLoaded", function(event) {
    var complete, inprogress, notstarted;

    var complete = new JustGage({
        id: "complete",
        value: getRandomInt(0, 1000),
        titleFontFamily: "Work Sans",
        valueFontFamily: "Work Sans",
        titleFontColor: "#ffffff",
        valueFontColor: "#ffffff",
        min: 0,
        max: 1000,
        gaugeWidthScale: 1.0,
        levelColors: ["#a2c171", "#92b558", "#8bb14e"],
        title: "Complete",
        relativeGaugeSize: true,
        donut: true,
    });

    var inprogress = new JustGage({
        id: "inprogress",
        value: getRandomInt(0, 1000),
        titleFontFamily: "Work Sans",
        valueFontFamily: "Work Sans",
        titleFontColor: "#ffffff",
        valueFontColor: "#ffffff",
        min: 0,
        max: 1000,
        gaugeWidthScale: 1.0,
        levelColors: ["#ffd480", "#ffcc66", "#ffc34d"],
        title: "In-Progress",
        relativeGaugeSize: true,
        donut: true,
    });

    var notstarted = new JustGage({
        id: "notstarted",
        value: getRandomInt(0, 1000),
        titleFontFamily: "Work Sans",
        valueFontFamily: "Work Sans",
        titleFontColor: "#ffffff",
        valueFontColor: "#ffffff",
        min: 0,
        max: 1000,
        gaugeWidthScale: 1.0,
        levelColors: ["#ff944d", "#ff8533", "#ff751a"],
        title: "Not-Started",
        relativeGaugeSize: true,
        donut: true
    });
});