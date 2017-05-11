<?php

namespace App\Controllers\Faculty;

use \Core\View;


class Dashboard extends \Core\Controller
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
        $userSpecs = \App\Models\Dashboard::getUser();
        $user = $userSpecs['name'];
        View::render('Faculty/dashboard.php', [
            'name' => $user
        ]);
    }
}
