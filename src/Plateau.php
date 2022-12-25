<?php

namespace MarsRover;

class Plateau
{
    private int $width;
    private int $height;
    private ?MarsRover $rover = null;

    public function __construct(int $width, int $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function getHeight(): int
    {
        return $this->height;
    }
}
