/**
 * Created by sirot on 5/25/2017.
 */
var chart = AmCharts.makeChart("chartdiv", {
    "type": "pie",
    "theme": "light",
    "dataProvider": [{
        "label": "AHSS",
        "value": 50
    }, {
        "label": "BEIT",
        "value": 10
    }, {
        "label": "BTS",
        "value": 75
    }, {
        "label": "HHS",
        "value": 5
    }, {
        "label": "LIB",
        "value": 10
    }, {
        "label": "M&S",
        "value": 40
    }],
    "valueField": "value",
    "titleField": "label",
    "labelRadius": 10,
    "radius": 200,
    "labelText": "[[title]]",
    "marginTop": 0,
    "marginBottom": 0,
    "groupPercent": 5

});

chart.addListener('rendered', function(event) {
    // populate our custom legend when chart renders
    chart.customLegend = document.getElementById('legend');
    for (var i in chart.chartData) {
        var row = chart.chartData[i];
        var color = chart.colors[i];
        var percent = Math.round(row.percents * 100) / 100;
        var value = row.value;
        legend.innerHTML += '<div class="legend-item" id="legend-item-' + i + '" onclick="toggleSlice(' + i + ');" onmouseover="hoverSlice(' + i + ');" onmouseout="blurSlice(' + i + ');" ><div class="legend-marker" style="background: ' + color + '"></div>' + row.title + '<div class="legend-value">' + value + ' | ' + percent + '%</div></div>';
    }
});

function toggleSlice(item) {
    chart.clickSlice(item);
}

function hoverSlice(item) {
    chart.rollOverSlice(item);
}

function blurSlice(item) {
    chart.rollOutSlice(item);
}
