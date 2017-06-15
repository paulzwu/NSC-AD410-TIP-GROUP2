<!-- Main Content -->
         <div class="content">
             <div class="container-fluid" style="display:none;">
        <!-- TIP RESPONSE RATE STATS PANEL -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">TIP Submission Rates</h4>
                        <p id="totalFaculty" class="category">Total Responses Expected: </p>
                        <p id="waitingOn" class="category">Waiting On: </p>
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
            <div class="container-fluid">

             <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="col-lg-12">
                                <h1>Let's Start Your Assessment!</h1>
                            </div>

                            <div class="col-lg-12 start-div">
                                <a href="tip.php">
                                    <button class="btn btn-info start-tip-button">Start New</button>
                                </a>
                            </div>
                        </div>
                     </div>
              </div>

<!-- Search Grid -->
<?php //include("Views/Faculty/search_grid.php") ?>
<table id="table_id" class="display "></table>

    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>


