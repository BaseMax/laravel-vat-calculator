<?php

namespace App\Enums;

/**
 * @method static self ADMIN()
 * @method static self USER()
 */
class UserRole extends BaseEnumRandom
{
    /**
     * Define the values for the enum.
     */
    protected static function values(): array
    {
        return [
            'ADMIN' => '1',
            'USER' => '0',
        ];
    }

    /**
     * Define the labels for the enum.
     */
    protected static function labels(): array
    {
        return [
            'ADMIN' => 'Admin',
            'USER' => 'User',
        ];
    }
}
