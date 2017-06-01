<?php

namespace App\Controllers\Admin;

use \Core\View;

class FAQ extends \Core\Controller
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
        View::render('Admin/admin_faqs.php', [
            'name' => 'User'
        ]);
    }
}
