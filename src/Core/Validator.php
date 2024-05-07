<?php

namespace Core;

class Validator
{

    public static function string(string $value, int $min = 1, int $max = PHP_INT_MAX): bool
    {
        $len = strlen(trim($value));
        return $len <= $max && $len >= $min;
    }


    public static function email($value): bool
    {
        return filter_var(trim($value), FILTER_VALIDATE_EMAIL);
    }
}