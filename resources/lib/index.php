<?php

// put full path to Smarty.class.php
require('php/Smarty/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir('/web/www.example.com/smarty/templates');
$smarty->setCompileDir('/web/www.example.com/smarty/templates_c');
$smarty->setCacheDir('/web/www.example.com/smarty/cache');
$smarty->setConfigDir('/web/www.example.com/smarty/configs');

$smarty->assign('name', 'Ned');
$smarty->display('index.tpl');

?>