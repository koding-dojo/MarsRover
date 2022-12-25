<?php

namespace MarsRover;

class MarsRover
{
    private int $x;
    private int $y;
    private Direction $direction;
    private Plateau $plateau;

    public function __construct(int $x, int $y, Direction $direction)
    {
        $this->x = $x;
        $this->y = $y;
        $this->direction = $direction;
    }

    public function landOn(Plateau $plateau)
    {
        $this->plateau = $plateau;
    }

    public function move(Command $command)
    {
        if ($command->equals(Command::moveForward())) {
            if ($this->direction->equals(Direction::north())) {
                $this->y += 1;
            } elseif ($this->direction->equals(Direction::east())) {
                $this->x += 1;
            } elseif ($this->direction->equals(Direction::south())) {
                $this->y -= 1;
            } elseif ($this->direction->equals(Direction::west())) {
                $this->x -= 1;

            }
        } elseif ($command->equals(Command::rotateRight())) {
            if ($this->direction->equals(Direction::north())) {
                $this->direction = Direction::east();
            } elseif ($this->direction->equals(Direction::east())) {
                $this->direction = Direction::south();
            } elseif ($this->direction->equals(Direction::south())) {
                $this->direction = Direction::west();
            } elseif ($this->direction->equals(Direction::west())) {
                $this->direction = Direction::north();
            }
        }  elseif ($command->equals(Command::rotateLeft())) {
            if ($this->direction->equals(Direction::north())) {
                $this->direction = Direction::west();
            } elseif ($this->direction->equals(Direction::east())) {
                $this->direction = Direction::north();
            } elseif ($this->direction->equals(Direction::south())) {
                $this->direction = Direction::east();
            } elseif ($this->direction->equals(Direction::west())) {
                $this->direction = Direction::south();
            }
        }

    }

    public function getDirection(): Direction
    {
        return $this->direction;
    }

    /**
     * @return int
     */
    public function getX(): int
    {
        return $this->x;
    }

    /**
     * @return int
     */
    public function getY(): int
    {
        return $this->y;
    }

    public function __set($name, $value)
    {
        if ($name === 'x') {
            $this->x = max(0, min($value, $this->plateau->getWidth()));
        } elseif ($name === 'y') {
            $this->y = max(0, min($value, $this->plateau->getHeight()));
        }
    }
}
