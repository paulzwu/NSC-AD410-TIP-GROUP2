<?php

namespace App\Models;

use PDO;

//        This is where you should write your db access functions
//        Views will access the data by calling methods from this class using a class instance

class AdminDash extends \Core\Model
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

    /**
     * Get completion stats
     *
     * @return array
     */
    public static function getStats()
    {
        $stats = array (
            "complete"      => 20,
            "inprogress"    => 10,
            "notstarted"    => 30
        );
        return $stats;
    }
}
