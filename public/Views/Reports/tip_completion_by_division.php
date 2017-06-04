<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADMIN REPORTS</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Verdana;
            font-size: 11px;
            padding: 10px;
        }

        #chartdiv {
            width: 600px;
            height: 500px;
            font-size: 11px;
            border: 2px solid #eee;
            float: left;
            margin-bottom: 10pc;
            margin-left: 18pc;
        }
        #legend {
            width: 250px;
            height: 400px;
            border: 2px solid #eee;
            margin-left: 10px;
            float: left;
            padding-top: 50px;
            padding-bottom: 50px;
            margin-bottom: 10pc;
        }
        #legend .legend-item {
            margin: 10px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }
        #legend .legend-item .legend-value {
            font-size: 12px;
            font-weight: normal;
            margin-left: 22px;
            margin-bottom: 25px;
        }
        #legend .legend-item .legend-marker {
            display: inline-block;
            width: 12px;
            height: 12px;
            border: 2px solid #ccc;
            margin-right: 10px;
        }
        #legend .legend-item.disabled .legend-marker {
            opacity: 0.2;
            background: #ddd;
        }
        h2{
            text-align: center;
            font-size: 30px;
        }
        .container-fluid{
            margin: 0 auto;
        }

    </style>
</head>
<body>

<div class="container-fluid">
        <h2 style="margin-bottom:100px; margin-top:60px;">Response by Department</h2>

        <div id="chartdiv" align="center"></div>
        <div id="legend" align="center"></div>

</div>

<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/pie.js"></script>

<script src="pie.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>
</html>
