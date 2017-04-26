<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Dash</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/v/bs/jq-2.2.4/dt-1.10.15/datatables.min.css">
    <script type="text/javascript" src="<?php echo asset('js/jquery.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo asset('js/bootstrap.min.js');?>"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-2.2.4/dt-1.10.15/datatables.min.js"></script>

    <!-- Custom Theme Style -->
    <link rel="stylesheet" href="<?php echo asset('css/admin_styles.css');?>" />

  </head>
  
  <body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
              <img src="img/logo.png" alt="North Seattle College">
            </div>
            <ul class="nav navbar-nav"><!-- all files must reside under ../ajax_recipe/ or this will not work -->
                <li class="active"><a href="{{ url('') }}"><i class="fa fa-home"></i> Home</a>/li>
            </ul>
            <form class="navbar-form navbar-right" method="POST">
                <input type="checkbox" name="remember">
                <label>Remember me!</label>
                <div class="form-group">
                    <input type="text" class="form-control" name="user_name" placeholder="Username">
                </div>
                <div class="form-group">
                    <input type ="password" class="form-control" name="password" placeholder="Password">
                </div>
                <button type="button" class=".btn-link" value="login" name="action">Submit</button>
                <a href="includes/login_registration/register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a>
            </form>
        </div>
    </nav>

  <footer class="footer">
        <div class="container">
            <div class="row bort">

                <div class="copyright">© Copyright ADBAS Program | North Seattle Community College</div>

            </div>
        </div>
    </footer>
    <script type="text/javascript" src="<?php echo asset('js/custom.js');?>"></script>
  </body>
</html>
