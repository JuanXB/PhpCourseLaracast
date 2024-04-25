<?php
use core\Response;

function dumpAndDie($value): void
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}

function urlIs(string $url) : bool
{
    return $_SERVER['REQUEST_URI'] === $url; 
}

function authorized(bool $conditional, int $status = Response::FORBIDDEN) {
    if(! $conditional) abort($status);
}

function base_path(string $path):string
{
    return BASE_PATH.$path;
}

function view(string $path, array $attributes = []) {

    extract($attributes);

    require base_path('views/'.$path);
}

function abort(int $code = Response::NOT_FOUND): void
{
    http_response_code($code);

    require base_path('views/errors/'.$code.'.php');

    die();
}
