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



            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        return $db;
    }
}
