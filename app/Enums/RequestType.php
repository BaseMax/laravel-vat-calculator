<?php

namespace App\Enums;

/**
 * @method static self ADD()
 * @method static self EXCLUDE()
 */
class RequestType extends BaseEnumRandom
{
    /**
     * Define the values for the enum.
     */
    protected static function values(): array
    {
        return [
            'ADD' => '1',
            'EXCLUDE' => '0',
        ];
    }

    /**
     * Define the labels for the enum.
     */
    protected static function labels(): array
    {
        return [
            'ADD' => 'Add',
            'EXCLUDE' => 'Exclude',
        ];
    }
}
