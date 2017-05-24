<?php

// namespace App\Models;

// use PDO;

// //        This is where you should write your db access functions
// //        Views will access the data by calling methods from this class using a class instance

// class TipEditor extends \Core\Model
// {

     /*
   * Retrieves survey names from DB for populating in a select element
   */
    // public static function getSurveys()
    // {
    //       $table = 'Surveys';
    //       $col1 = 'surveyID';
    //       $col2 = 'surveyName';
    //       $sqlstmt = "SELECT $col1, $col2 FROM $table;";
    //       try {
    //         // $conn = new PDO("sqlite:DB/tip-editor-testDB.sqlite");
    //         // $db = static::getDB();
    //         $db = new PDO("sqlite:DB/tip-editor-testDB.sqlite");
    //         $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //         $statement = $db->prepare($sqlstmt);
    //         $statement->execute();
    //         $statement->setFetchMode(PDO::FETCH_ASSOC);
    //         $jsonData = $statement->fetchAll();
    //         $jsonArray = array('surveyInfo'=>$jsonData);
    //         // echo json_encode($jsonArray);
    //         $db = NULL;
    //       } catch (PDOException $e) {
    //         echo "PHP Load error: ".$e->getMessage();
    //       }
    //     return $jsonArray;
    // }


//     public static function getUser()
//     {
//         $user = array (
//             "name" => "User"
//         );
//         return $user;
//     }
// }




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
       $db->openOrCreateDB();
          $table = 'Surveys';
          $col1 = 'surveyID';
          $col2 = 'surveyName';
          $sqlstmt = "SELECT $col1, $col2 FROM $table;";
          try {
            // $conn = new PDO("sqlite:DB/tip-editor-testDB.sqlite");
            // $db = static::openOrCreateDB();
            // $db = new PDO('sqlite:tip-editor-testDB.sqlite');
            // $db = static::getDB();
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $statement = $db->prepare($sqlstmt);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $jsonData = $statement->fetchAll();
            $jsonArray = array('surveyInfo'=>$jsonData);
            // echo json_encode($jsonArray);
            $db = NULL;
          } catch (PDOException $e) {
            echo "PHP Load error: ".$e->getMessage();
          }
        return $jsonArray;
    }
}
