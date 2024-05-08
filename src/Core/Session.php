<?php

namespace Core;

class Session
{

    protected const FLASH_SESSION = '__flash';

    public static function has(string $key): bool
    {
        return (bool) self::get($key);
    }

    public static function put(string $key, mixed $value): void
    {
        $_SESSION[$key] = $value;
    }

    public static function get(string $key, mixed $default = null): mixed
    {
        if (isset($_SESSION[self::FLASH_SESSION][$key])) {
            return $_SESSION[self::FLASH_SESSION][$key];
        }

        return $_SESSION[$key] ?? $default;
    }

    public static function flush(): void
    {
        $_SESSION = [];
    }

    public static function unset(string $key): void
    {
        unset($_SESSION[$key]);
    }

    public static function destroy(): void
    {
        self::flush();

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

    public static function flash(string $key, mixed $value): void
    {
        $_SESSION[self::FLASH_SESSION][$key] = $value;
    }

    public static function unflash(): void
    {
        self::unset(self::FLASH_SESSION);
    }


}