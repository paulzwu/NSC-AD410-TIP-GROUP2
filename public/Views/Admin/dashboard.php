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
        <table id="table_id" class="display" width="100%">
            <?php include "filter.php" ?>
        </table>
        </div>

        <!-- REPORT MODAL -->
        <div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalHeader"></h4>
      </div>
      <div class="modal-body">
        <p id="modalDescription"></p>
        <br>
        <!-- DATE RANGE PICKER -->
    <div class="row">
            <div class="form-group col-sm-4 reportSpecifications">
              <label for="usr">Start Date:</label>
              <input type="date" class="form-control dateRange" id="startDate" onchange="getSelectedRange()">
            </div>
            <div class="form-group col-sm-4">
              <label for="pwd">End Date:</label>
              <input type="date" class="form-control dateRange" id="endDate" onchange="getSelectedRange()">
            </div>
                        <div class="form-group col-sm-4">
              <div class="form-group academicYear">
              <label for="pwd">Academic Year:</label>
                  <select class="form-control" id="academicYear">

                  </select>
                </div>
            </div>
      </div>
      <div class="row">
        <div class="checkbox col-sm-6">
          <label><input id="includeDataViz" onchange="includeViz()" type="checkbox" value="">Include Data Visualization</label>
        </div>
        <div class="col-sm-6">
                    <label for="pwd">Export As:</label>
          <select class="form-control" id="exportType" onchange="exportKind()">
                <option id="PDF">PDF</option>
                <option id="CSV">CSV</option>
          </select>
        </div>

          
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-success" onclick="clearReportFields()">Clear Fields</button>
        <button type="submit" onclick="exportReport()" class="btn btn-success">Export</button>
        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>





