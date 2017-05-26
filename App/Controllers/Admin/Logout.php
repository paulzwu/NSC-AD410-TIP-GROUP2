<?php

namespace App\Controllers\Admin;

use \Core\View;


class Logout extends \Core\Controller
{

    /**
     * Before filter
     *
     * @return void
     */
    protected function before()
    {
        // Make sure an admin user is logged in for example
        // return false;
    }

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        session_unset();
        session_destroy();
        header('Location: http://markpfaff.com/projects/NSC-AD410-TIP-GROUP2/public/');
        exit();
    }
    
}