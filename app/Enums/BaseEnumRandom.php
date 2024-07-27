<?php

namespace App\Enums;

use Spatie\Enum\Enum;

abstract class BaseEnumRandom extends Enum
{
    /**
     * Get a random enum value.
     *
     * @return static
     */
    public static function random(): self
    {
        $values = static::values();

        return static::from(
            $values[array_rand($values)]
        );
    }

    /**
     * Get an array of possible enum values.
     */
    public static function possibleValues(): array
    {
        return array_values(static::values());
    }

    /**
     * Get an array of possible enum names.
     */
    public static function possibleNames(): array
    {
        return array_keys(static::values());
    }
}
