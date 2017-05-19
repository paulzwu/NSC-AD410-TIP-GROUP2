<?php

namespace App\Controllers;

use \Core\View;
use \Core\Config;
use smtech\OAuth2\Client\Provider\CanvasLMS;
use GuzzleHttp\Client;


class Login extends \Core\Controller
{

    /**
     * Before filter
     *
     * @return void
     */
    protected function before()
    {

        // error_reporting(E_ALL);
        // ini_set('display_errors', 1);
        // require_once "../vendor/autoload.php";

        // session_start();

        // /* anti-fat-finger constant definitions */
        // define('CODE', 'code');
        // define('STATE', 'state');
        // define('STATE_LOCAL', 'oauth2-state');

        // $provider = new CanvasLMS([
        //     'clientId' => $config['canvasClientId'] ,
        //     'clientSecret' => $config['canvasClientSecret'],
        //     'purpose' => 'tip',
        //     'redirectUri' => $config['redirectUri'],
        //     'canvasInstanceUrl' => $config['canvasInstanceUrl']
        // ]);

        // $c = new Client(['verify'=>false]);
        // $provider->setHttpClient($c);

        // /* if we don't already have an authorization code, let's get one! */
        // if (!isset($_GET[CODE])) {
        //     $authorizationUrl = $provider->getAuthorizationUrl();
        //     $_SESSION[STATE_LOCAL] = $provider->getState();
        //     header("Location: $authorizationUrl");
        //     exit;

        // /* check that the passed state matches the stored state to mitigate cross-site request forgery attacks */
        // } elseif (empty($_GET[STATE]) || $_GET[STATE] !== $_SESSION[STATE_LOCAL]) {
        //     unset($_SESSION[STATE_LOCAL]);
        //     exit('Invalid state');

        // } else {
        //     /* try to get an access token (using our existing code) */
        //     $token = $provider->getAccessToken('authorization_code', [CODE => $_GET[CODE]]);

        //     /* do something with that token... (probably not just print to screen, but whatevs...) */
        //     echo $token->getToken();
        //     exit;
        // }
    }

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {

        View::render('index.php', [
        ]);
    }
}
