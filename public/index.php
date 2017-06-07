<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$pagetitle = 'Tip';
include 'Views/templates/header.php';

if($usertype=="admin"){
    include 'Views/Admin/dashboard.php';

}else{
    include 'Views/Faculty/dashboard.php';
}

include 'Views/templates/footer.php';



