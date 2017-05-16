<?php

namespace App;


class Config
{
    //OAuth configurations for canvas authorization
    global  $config;
    $config = [
        'canvasClientId' => '90000000000379',
        'canvasClientSecret' => 'Jf24s5qoapRwU2xQasluOqW5YhxYvAbKexh9yssstII5EX0fmjRUES526kHU9xXZ',
        'redirectUri'=> "http://markpfaff.com/projects/NSC-AD410-TIP-GROUP2/public/",
        'canvasInstanceUrl'=>'https://northseattle.test.instructure.com'
    ];

    // /**
    //  * Database host
    //  * @var string
    //  */
    // const DB_HOST = 'localhost';

    // /**
    //  * Database name
    //  * @var string
    //  */
    // const DB_NAME = 'mvc';

    // /**
    //  * Database user
    //  * @var string
    //  */
    // const DB_USER = 'root';

    // /**
    //  * Database password
    //  * @var string
    //  */
    // const DB_PASSWORD = 'secret';
}
