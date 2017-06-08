<?php
session_start();
session_unset();
session_destroy();
header('Location: http://markpfaff.com/projects/NSC-AD410-TIP-GROUP2/public/');
exit();
?>