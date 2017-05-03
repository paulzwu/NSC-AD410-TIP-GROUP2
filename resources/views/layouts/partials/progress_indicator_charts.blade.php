<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Raleway:400,300,600,800,900" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?php echo asset('css/master_styles.css');?>" />


        <title>My Charts</title>

        {!! Charts::assets() !!}

    </head>
    <body>
            <div class="row">
                <div class="col-lg-4">
                    {!! $chart_complete->render() !!}
                </div>
                <div class="col-lg-4">
                    {!! $chart_inprogress->render() !!}
                </div>
                <div class="col-lg-4">
                    {!! $chart_notstarted->render() !!}
                </div>
            </div>
    </body>
</html>
