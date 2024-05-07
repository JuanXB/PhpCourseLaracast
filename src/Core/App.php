<?php
namespace Core;

use Core\Container;

class App
{

    protected static Container $container;

    public static function setContainer(Container $container) 
    {
        self::$container = $container;
    }

    public static function container() : Container
    {
        return self::$container;
    }

    public static function bind(string $key,$resolver) 
    {
        self::$container->bind($key, $resolver);
    }

    public static function resolver(string $key) : mixed
    {
        return self::$container->resolver($key);
    }
}