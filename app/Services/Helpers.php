<?php

namespace App\Services;

class Helpers
{
    public static function hectogramToKg(int $hectogram): int
    {
        return $hectogram / 10;
    }
}
