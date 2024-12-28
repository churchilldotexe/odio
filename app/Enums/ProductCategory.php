<?php

namespace App\Enums;

enum ProductCategory: string
{
    case EARPHONES = 'earphones';
    case HEADPHONES = 'headphones';
    case SPEAKERS = 'speakers';

    public function label(): string
    {
        return match ($this) {
            self::EARPHONES => 'Earphones',
            self::HEADPHONES => 'Headphones',
            self::SPEAKERS => 'Speakers',
        };
    }
}
