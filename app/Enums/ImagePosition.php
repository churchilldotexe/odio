<?php

namespace App\Enums;

enum ImagePosition: string
{
    case FIRST = 'first';
    case SECOND = 'second';
    case THIRD = 'third';

    public function label(): string
    {
        return match ($this) {
            self::FIRST => 'first',
            self::SECOND => 'second',
            self::THIRD => 'third'
        };
    }
}
