<?php

namespace MarsRover;

use Spatie\Enum\Enum;

/**
 * Class Direction
 * @method static self north()
 * @method static self east()
 * @method static self west()
 * @method static self south()
 * @package MarsRover
 */
class Direction extends Enum
{
    public static function fromString(string $direction): self
    {
        switch (strtoupper($direction)) {
            case 'N':
                return self::north();
            case 'E':
                return self::east();
            case 'S':
                return self::south();
            case 'W':
                return self::west();
        }

        throw new \InvalidArgumentException();
    }
}
