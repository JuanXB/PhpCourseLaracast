<?php

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
