document.addEventListener("DOMContentLoaded", function(event) {
    var complete, inprogress, notstarted;

    var complete = new JustGage({
        id: "complete",
        value: getRandomInt(0, 1000),
        titleFontFamily: "Open Sans",
        valueFontFamily: "Open Sans",
        titleFontColor: "#7f8c8d",
        valueFontColor: "#7f8c8d",
        min: 0,
        max: 1000,
        gaugeWidthScale: 0.2,
        levelColors: ["#a2c171", "#92b558", "#8bb14e"],
        title: "COMPLETE",
        relativeGaugeSize: true,
        donut: true,
    });

    var inprogress = new JustGage({
        id: "inprogress",
        value: getRandomInt(0, 1000),
        titleFontFamily: "Open Sans",
        valueFontFamily: "Open Sans",
        titleFontColor: "#7f8c8d",
        valueFontColor: "#7f8c8d",
        min: 0,
        max: 1000,
        gaugeWidthScale: 0.2,
        levelColors: ["#ffd480", "#ffcc66", "#ffc34d"],
        title: "IN-PROGRESS",
        relativeGaugeSize: true,
        donut: true,
    });

    var notstarted = new JustGage({
        id: "notstarted",
        value: getRandomInt(0, 1000),
        titleFontFamily: "Open Sans",
        valueFontFamily: "Open Sans",
        titleFontColor: "#7f8c8d",
        valueFontColor: "#7f8c8d",
        min: 0,
        max: 1000,
        gaugeWidthScale: 0.2,
        levelColors: ["#ff944d", "#ff8533", "#ff751a"],
        title: "NOT-STARTED",
        relativeGaugeSize: true,
        donut: true
    });
});
