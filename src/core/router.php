<?php
use core\Response;

$uri = parse_url($_SERVER['REQUEST_URI'])["path"];

$routes = require base_path('routes.php');

function routeToController(string $uri, array $routes): void
{
    if (array_key_exists($uri, $routes)) {
        require base_path($routes[$uri]);
    } else {
        abort();
    }
}

function abort(int $code = Response::NOT_FOUND): void
{
    http_response_code($code);

    require base_path('views/errors/'.$code.'.php');
   
    die();
}

routeToController($uri, $routes);
