<?php

namespace Core\Middleware;

class Middleware {
    public const MAP = [
        'guest' => Guest::class,
        'auth'  => Auth::class
    ];

    public static function resolve(?string $key)
    {
        if(is_null($key)) {
            return;
        }

        $middleware = static::MAP[$key];

        if(!$middleware) {
            throw new \Exception('Middleware with name '.$key.' not exists.');
        }

        (new $middleware)->handle();
    }
}