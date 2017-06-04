var complete, inprogress, notstarted;
var statsComplete = 0, statsInProgress = 0, statsNotStarted = 0;

    complete = new JustGage({
        id: "complete",
        value: statsComplete,
        titleFontFamily: "Open Sans",
        valueFontFamily: "Open Sans",
        titleFontColor: "#7f8c8d",
        valueFontColor: "#7f8c8d",
        min: 0,
        max: 50,
        gaugeWidthScale: 0.2,
        levelColors: ["#a2c171", "#92b558", "#8bb14e"],
        title: "COMPLETE",
        relativeGaugeSize: true,
        donut: true,
    });

    inprogress = new JustGage({
        id: "inprogress",
        value: statsInProgress,
        titleFontFamily: "Open Sans",
        valueFontFamily: "Open Sans",
        titleFontColor: "#7f8c8d",
        valueFontColor: "#7f8c8d",
        min: 0,
        max: 50,
        gaugeWidthScale: 0.2,
        levelColors: ["#ffd480", "#ffcc66", "#ffc34d"],
        title: "IN-PROGRESS",
        relativeGaugeSize: true,
        donut: true,
    });

    notstarted = new JustGage({
        id: "notstarted",
        value: statsNotStarted,
        titleFontFamily: "Open Sans",
        valueFontFamily: "Open Sans",
        titleFontColor: "#7f8c8d",
        valueFontColor: "#7f8c8d",
        min: 0,
        max: 50,
        gaugeWidthScale: 0.2,
        levelColors: ["#ff944d", "#ff8533", "#ff751a"],
        title: "NOT-STARTED",
        relativeGaugeSize: true,
        donut: true
    });
