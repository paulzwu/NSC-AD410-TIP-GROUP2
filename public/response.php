<?php

define('PROVIDER', 'provider');

$token = $provider->getAccessToken('authorization_code', [CODE => $_GET[CODE]]);

echo 'Hello: ' . $token;

?>