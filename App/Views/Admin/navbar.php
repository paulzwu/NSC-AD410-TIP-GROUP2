<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!--Brand and toggle-->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#"><img src="assets/img/alt_logo.png" height="50" width="50" alt="NSC Logo"></a>
            <span>Welcome, <?php echo htmlspecialchars($name); ?></span>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li class="page-scroll">
                    <a href="admin">Dashboard</a>
                </li>
                <li class="page-scroll">
                    <a href="admin#reports">Reports</a>
                </li>
                <li>
                    <a href="edit">TIP Editor</a>
                </li>
                <li>
                    <a href="adminfaq">FAQs</a>
                </li>
                <li>
                    <a href="support">Support</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>