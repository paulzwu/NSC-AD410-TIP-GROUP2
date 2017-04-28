<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="<?php echo url('/');?>">
                <img src="<?php echo asset('img/alt_logo.png');?>" height="50" width="55" alt="NSC Logo">
            </a>
        </div>

            <div class="container">
            <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo url('/admin');?>">HOME</a></li>
            <li><a href="<?php echo url('/tipeditor');?>">TIP EDITOR</a></li>
            <li><a href="<?php echo url('/adminfaqs');?>">FAQs</a></li>
            </ul>
            <p class="navbar-text navbar-right">Signed in as <a href="/" class="navbar-link">Administrator</a><a href="<?php echo url('/');?>">
            <span class="glyphicon glyphicon-log-out"></span>
        </a></p>
    </div>
</nav>
