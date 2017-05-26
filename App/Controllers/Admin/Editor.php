<?php

namespace App\Controllers\Admin;

use \Core\View;
use App\Models\TipEditor;


class Editor extends \Core\Controller
{
// The function to call to check if request received is ajax request or not
    function is_ajax() {
      return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
    }
    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        //Checks to see if incoming request is an ajax request or not
        //Do ajax processing here
        if ($this->is_ajax()){

            //Example
            $action = $_POST["ID"];
            switch($action) {
                case "ID":
                    $result = TipEditor::loadSurvey();
                    //View render takes a php associative array, and echos it to the view as indiviual views
                    echo $result;
                    break;

                default:
                break;
            }
        } else {

        
            //get username
            $userSpecs = TipEditor::getUser();
            $user = $userSpecs['name'];
            View::render('Admin/tip_editor.php', [
                'name' => $user
            ]);
        }
    }
}
