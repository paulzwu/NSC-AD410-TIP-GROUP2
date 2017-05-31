<?php
namespace App\Models;

use App\SQLiteConnection;

class TipEditor
{

    /**
     * Get user name for current user
     *
     * @return array
     */
    public static function getUser()
    {
        $user = array (
            "name" => "User"
        );
        return $user;
    }

  /*
     * Retrieves a survey JSON object from DB
     */
	public static function loadSurvey() {
    
        $surveyID = (isset($_POST['ID'])) ? $_POST['ID'] : "";
        $table = 'Surveys';
        $col1 = 'surveyID';
        $col2 = 'jsonData';
        $sqlstmt = "SELECT $col2 FROM $table WHERE $col1 = '$surveyID';";
        try {
            // $conn = new PDO("sqlite:DB/tip-editor-testDB.sqlite");
            $conn = (new SQLiteConnection())->connect();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $statement = $conn->prepare($sqlstmt);
            $statement->execute();
            $surveyData = $statement->fetchColumn();
            // $conn = NULL;
        } catch (PDOException $e) {
            echo "PHP Load error: ".$e->getMessage();
            print_r($surveyData);
        }


    }


}
