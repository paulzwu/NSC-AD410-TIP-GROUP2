<!-- Main Content -->
<div class="content responses-content">
    <div class="container-fluid">
        <!-- TIP RESPONSE RATE STATS PANEL -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">TIP Submission Rates</h4>
                        <p class="category">Total Responses Expected: <?php echo $totalFaculty ?></p>
                        <p class="category">Waiting On: <?php echo $waitingOn ?></p>
                    </div>
                    <div class="content">
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
                </div>
            </div>
        </div>
        <!-- DATAGRID -->
        </div>
        <table id="table_id" class="display "></table>
        </div>
        <!-- REPORT MODAL -->
        <div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Export</button>
        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>





