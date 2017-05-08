<!--Landing Dashboard-->
<div class="content-wrapper">
    <header id="page-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 text-left">
                    <h3>Current Response Rates</h3>
                </div>
                <div class="col-lg-8 text-right">
                    <h3>Expected Responses: <?php echo $totalFaculty ?></h3>
                    <h3>Waiting On: <?php echo $waitingOn ?></h3>
                </div>
                <div class="col-lg-12">
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-3 col-sm-4 col-xs-3">
                    <div id="complete" class="gauge"></div>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-4 col-xs-3">
                    <div id="inprogress" class="gauge"></div>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-4 col-xs-3">
                    <div id="notstarted" class="gauge"></div>
                </div>
            </div>
        </div>
    </header>