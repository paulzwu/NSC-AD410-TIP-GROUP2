<?php
namespace App\Models;

use PDO;

//        This is where you should write your db access functions
//        Views will access the data by calling methods from this class using a class instance

class TipEditor extends \Core\Model
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
   * Retrieves survey names from DB for populating in a select element
   */
    public static function getSurveys()
    {
       $surveyData = (isset($_POST['saveData'])) ? $_POST['saveData'] : "";
        $surveyName = (isset($_POST['saveName'])) ? $_POST['saveName'] : "";
        $jsonData = JSON_decode($surveyData);
        $table = 'Surveys';
        $col1 = 'surveyID';
        $col2 = 'jsonData';
        $col3 = 'surveyName';
        $sqlstmt = "INSERT INTO $table($col2, $col3) VALUES ('$surveyData', '$surveyName');";
        try {
          $conn = new PDO("sqlite:test.sqlite");
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $statement = $conn->prepare($sqlstmt);
          $statement->execute();
          $conn = NULL;
        } catch (PDOException $e) {
          echo "PHP Save error: ".$e->getMessage();
        }
    }

    public static function loadSurveys(){
        $surveyID = (isset($_POST['ID'])) ? $_POST['ID'] : "";
        $table = 'Surveys';
        $col1 = 'surveyID';
        $col2 = 'jsonData';
        $sqlstmt = "SELECT $col2 FROM $table WHERE $col1 = '$surveyID';";
        try {
          $conn = new PDO("sqlite:test.sqlite");
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $statement = $conn->prepare($sqlstmt);
          $statement->execute();
          $surveyData = $statement->fetchColumn();
          $conn = NULL;
        } catch (PDOException $e) {
          echo "PHP Load error: ".$e->getMessage();
        }
          print_r($surveyData);
    }


}
