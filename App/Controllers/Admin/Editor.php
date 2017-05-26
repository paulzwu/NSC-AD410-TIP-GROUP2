<?php

namespace App\Controllers\Admin;

use \Core\View;
use App\Models\TipEditor;


class Editor extends \Core\Controller
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
        //get username
        $userSpecs = TipEditor::getUser();
        $user = $userSpecs['name'];
        View::render('Admin/tip_editor.php', [
            'name' => $user
        ]);
    }

}
