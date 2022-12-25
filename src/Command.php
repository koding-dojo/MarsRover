<?php


namespace MarsRover;


use Spatie\Enum\Enum;

/**
 * @method static self rotateRight()
 * @method static self rotateLeft()
 * @method static self moveForward()
 */
class Command extends Enum
{
    public static function fromString(string $command): self
    {
        switch(strtoupper($command)) {
            case 'L':
                return self::rotateLeft();
            case 'R':
                return self::rotateRight();
            case 'M':
                return self::moveForward();
        }
    }
}
