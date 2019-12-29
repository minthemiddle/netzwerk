<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Priority extends Enum
{
    const top5      =   0;
    const top50     =   1;
    const top100    =   2;

    public static function getColor($value)
    {
        $colors = [
            self::top5 => 'green',
            self::top50 => 'yellow',
            self::top100 => 'red',
        ];

        return $colors[$value] ?? 'gray';
    }
}
