<?php

namespace App\Controllers\Admin;

use \Core\View;


class Test extends \Core\Controller
{
    public function indexAction()
    {
        $movieJson = \App\Models\Test::getUser();
        View::render('Admin/table.php');
    }
}
