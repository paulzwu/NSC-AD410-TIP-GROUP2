<?php

/**
 * Front controller
 *
 * PHP version 5.4
 */

/**
 * Composer
 */
// require '../vendor/autoload.php';

/**
 * Autoloader
 */
spl_autoload_register(function ($class) {
   $root = dirname(__DIR__);   // get the parent directory
   $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
   if (is_readable($file)) {
       require $root . '/' . str_replace('\\', '/', $class) . '.php';
   }
});


/**
 * Routing
 */
$router = new Core\Router();

//Admin routes
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin', ['namespace' => 'Admin', 'controller' => 'Dashboard', 'action' => 'index']);
$router->add('edit', ['namespace' => 'Admin', 'controller' => 'Editor', 'action' => 'index']);
$router->add('adminfaq', ['namespace' => 'Admin', 'controller' => 'FAQ', 'action' => 'index']);
$router->add('support', ['namespace' => 'Admin', 'controller' => 'Support', 'action' => 'index']);
$router->add('', ['controller' => 'Login', 'action' => 'index']);

//Faculty Routes
$router->add('faculty', ['namespace' => 'Faculty', 'controller' => 'Dashboard', 'action' => 'index']);
$router->add('tip', ['namespace' => 'Faculty', 'controller' => 'TIP', 'action' => 'index']);
$router->add('facultyfaq', ['namespace' => 'Faculty', 'controller' => 'FAQ', 'action' => 'index']);
$router->add('facultysupport', ['namespace' => 'Faculty', 'controller' => 'Support', 'action' => 'index']);
    
$router->dispatch($_SERVER['QUERY_STRING']);
