<?php

namespace App;

/**
 * Application configuration
 *
 * PHP version 5.4
 */
class Config
{

    /**
     * Database Path
     * @var string
     */
    const SQLITE = '../App/Models/DB/test.sqlite';

    const CONFIG = [
        'canvasClientId' => '90000000000383',
        'canvasClientSecret' => 'onlPUzNNIxEXjisu0Ne3oUcEqPSQzrBpZbGUIS1a1pipl9h9glLZsMSjYk5dmmPd',
        'redirectUri'=> "http://markpfaff.com/projects/NSC-AD410-TIP-GROUP2/public/",
        'canvasInstanceUrl'=>'https://northseattle.test.instructure.com'
    ];

}
