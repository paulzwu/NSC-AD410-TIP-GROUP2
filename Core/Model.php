<?php

namespace Core;

use PDO;

/**
 * Base model
 *
 * PHP version 5.4
 */
abstract class Model
{

    /**
     * Get the PDO database connection
     *
     * @return mixed
     */
    protected static function getDB()
    {
        static $db = null;

        if ($db === null) {
    
            try {
                // $db = new PDO("sqlite:DB/tip-editor-testDB.sqlite");
                $db = new PDO('sqlite:tip-editor-testDB.sqlite');


            } catch (PDOException $e) {
                echo "PHP Load error: ".$e->getMessage();
            }
        }

        return $db;
    }


}
