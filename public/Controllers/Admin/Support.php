<?php

namespace App\Controllers\Admin;

use \Core\View;


class Support extends \Core\Controller
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
        View::render('Admin/support.php', [
            'name' => 'User'
        ]);
    }
}