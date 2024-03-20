<?php

$uri = parse_url($_SERVER['REQUEST_URI'])["path"];

$routes = [
    '/' => 'controllers/home.php',
    '/about' => 'controllers/about.php',
    '/contact' => 'controllers/contact.php',
];

function routeToController(string $uri, array $routes): void
{
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}

function abort(int $code = 404): void
{
    http_response_code($code);

    require 'views/errors/404.php';
   
    die();
}

routeToController($uri, $routes);
