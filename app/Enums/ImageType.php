<?php

namespace App\Enums;

enum ImageType: string
{
    case MAIN = 'main';
    case CATEGORY = 'category';

    public function label(): string
    {
        return match ($this) {
            self::MAIN => 'main',
            self::CATEGORY => 'category'
        };
    }
}
