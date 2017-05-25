<?php
namespace Core;

use PDO;
use App\Config;


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
                $dbname = "sqlite:".Config::SQLITE;
                $db = new PDO($dbname);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $message = true;
            } catch (PDOException $e) {
                $e->getMessage();
                $message = false;

            }
        }

        return $message;
    }


}
