<?php

    // const SQLITE = 'App/Models/DB/test.sqlite'; //loaded by  composer

    global $config;
	$config = [
        'canvasClientId' => '90000000000386',
        'canvasClientSecret' => '2bVdQCmOAqCD1N3HXxqbvk8fYyC0GtqUymqWpleyfl5EQhLfSwirsuc6A8pRjrpd',
        'redirectUri'=> "http://markpfaff.com/projects/NSC-AD410-TIP-GROUP2/public/",
        'canvasInstanceUrl'=>'https://northseattle.test.instructure.com'
    ];

include "dbhelper.php";
