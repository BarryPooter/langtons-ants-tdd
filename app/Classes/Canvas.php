<?php
namespace App\Classes;

class Canvas
{
    private $height;
    private $width;

    public function __construct(int $height, int $width)
    {
        $this->height = $height;
        $this->width = $width;
    }

    /**
     * Return the dimensions of this Canvas.
     * @return array
     */
    public function getDimensions() : array
    {
        return [$this->height, $this->width];
    }

    public function getPlayfield()
    {
        return new Playfield($this->height, $this->width);
    }
}