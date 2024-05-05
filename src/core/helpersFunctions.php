<?php
use core\Response;

function dd($value): void
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}

function urlIs(string $url): bool
{
    return $_SERVER['REQUEST_URI'] === $url;
}

function authorized(bool $conditional, int $status = Response::FORBIDDEN)
{
    if (!$conditional)
        abort($status);
}

function base_path(string $path): string
{
    return BASE_PATH . $path;
}

function view(string $path, array $attributes = [])
{

    extract($attributes);

    require base_path('views/' . $path);
}

function abort(int $code = Response::NOT_FOUND): void
{
    http_response_code($code);

    require base_path('views/errors/' . $code . '.php');

    die();
}


function login(array $user): void
{
    $_SESSION['user'] = [
        'email' => $user['email']
    ];
    session_regenerate_id(true);
}

function logout(): void
{
    $_SESSION = [];

    session_destroy();

    $cookieParams = session_get_cookie_params();
    setcookie(
        'PHPSESSID',
        '',
        time() - 3600,
        $cookieParams['path'],
        $cookieParams['domain'],
        $cookieParams['secure'],
        $cookieParams['httponly']
    );

}

function redirect(string $route = '/'): void
{
    header('location: ' . $route);
    die();
}