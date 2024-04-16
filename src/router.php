<?php

$uri = parse_url($_SERVER['REQUEST_URI'])["path"];

$routes = require 'routes.php';

function routeToController(string $uri, array $routes): void
{
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}

function abort(int $code = Response::NOT_FOUND): void
{
    http_response_code($code);

    require 'views/errors/'.$code.'.php';
   
    die();
}

routeToController($uri, $routes);
