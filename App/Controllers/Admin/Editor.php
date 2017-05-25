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

     public function testDB(){
        $db_conn = TipEditor::testDB();
        View::render('Admin/test_db_conn.php', [
                'db' => $db_conn
            ]);
    }

    public function loadSurveys(){
        if(empty($_POST['data'])){
            die();
        } else {
            $data = $_POST['data'];
            $result = TipEditor::loadSurveyIDs($data);
            View::render('Admin/tip_editor.php', $result);
        }
    }
    

}
