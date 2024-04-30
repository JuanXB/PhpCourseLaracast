<?php

const BASE_PATH = __DIR__ .'/../';
session_start();

require BASE_PATH. 'core/helpersFunctions.php';

spl_autoload_register(function($class) {

    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require base_path($class.'.php');
});


$router = new \core\Router();
require base_path('routes.php');

require base_path('bootstrap.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['__method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);