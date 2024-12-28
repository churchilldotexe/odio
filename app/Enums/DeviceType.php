<?php

namespace App\Enums;

enum DeviceType: string
{
    case MOBILE = 'mobile';
    case TABLET = 'tablet';
    case DESKTOP = 'desktop';

    public function label(): string
    {
        return match ($this) {
            self::MOBILE => 'mobile',
            self::TABLET => 'tablet',
            self::DESKTOP => 'desktop',
        };
    }
}
