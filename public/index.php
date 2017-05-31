<?php

include 'Views/templates/header.php';

if($usertype=="admin"){
    include 'Views/Admin/dashboard.php';

}else{
    include 'Views/Faculty/dashboard.php';
}

include 'Views/templates/footer.php';


