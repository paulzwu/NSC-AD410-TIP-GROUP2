<!--Landing Dashboard-->
<header id="page-top">
<div class="row">
<div class="col-lg-4">
  <?php include("quick_reports.php"); ?>
</div>
<div class="col-lg-8">
   <div class="panel">
    <div class="row">
        <div class="col-lg-12 ">
        <div class="col-lg-3 text-left">
            <h4>CURRENT RESPONSE RATES</h4>
        </div>
        <div class="col-lg-9 text-right">
            <h4>EXPECTED RESPONSES: <?php echo $totalFaculty ?></h4>
            <h4>WAITING ON: <?php echo $waitingOn ?></h4>
        </div>
        <div class="col-lg-12">
            <hr>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-4">
                <div id="complete" class="gauge"></div>
            </div>
            <div class="col-lg-4">
                <div id="inprogress" class="gauge"></div>
            </div>
            <div class="col-lg-4">
                <div id="notstarted" class="gauge"></div>
            </div>
        </div>
    </div>
    </div> 
</div>
</div>
</header>
