<!-- Tool Bar -->
<div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
								<p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
										Quick Reports
										<b class="caret"></b>
									</p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Report 1</a></li>
                                <li><a href="#">Report 2</a></li>
                                <li><a href="#">Report 3</a></li>
                                <li><a href="#">Report 4</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Export</a></li>
                              </ul>
                        </li>
                        <li>
                            <a href="#">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Tool Bar -->
        <!-- Main Content -->
         <div class="content">
            <div class="container-fluid">

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

                                <div class="footer">
                                    
                                    <hr>
                                    <div class="legend">
                                        <i class="fa fa-circle text-info"></i> Complete
                                        <i class="fa fa-circle text-danger"></i> In-Progress
                                        <i class="fa fa-circle text-warning"></i> Not-Started
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          </div>

