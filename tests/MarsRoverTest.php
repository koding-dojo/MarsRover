<?php

namespace Tests;

use MarsRover\Command;
use MarsRover\Direction;
use MarsRover\MarsRover;
use MarsRover\Plateau;
use PHPUnit\Framework\TestCase;

class MarsRoverTest extends TestCase
{
    public function testMarsRoverOne()
    {
        $plateau = new Plateau(5, 5);
        $rover = new MarsRover(1, 2, Direction::fromString('N'));
        $rover->landOn($plateau);
        foreach (str_split('LMLMLMLMM') as $move) {
            $rover->move(Command::fromString($move));
            echo "$move => {$rover->getX()} {$rover->getY()} {$rover->getDirection()->value}\n";
        }
        self::assertEquals(1, $rover->getX());
        self::assertEquals(3, $rover->getY());
        self::assertTrue($rover->getDirection()->equals(Direction::fromString('N')));
    }

    public function testMarsRoverTwo()
    {
        $plateau = new Plateau(5, 5);
        $rover = new MarsRover(3, 3, Direction::fromString('E'));
        $rover->landOn($plateau);
        foreach (str_split('MMRMMRMRRM') as $move) {
            $rover->move(Command::fromString($move));
            echo "$move => {$rover->getX()} {$rover->getY()} {$rover->getDirection()->value}\n";
        }
        self::assertEquals(5, $rover->getX());
        self::assertEquals(1, $rover->getY());
        self::assertTrue($rover->getDirection()->equals(Direction::fromString('E')));
    }
}
