<?php

namespace App\Classes;

class Tile
{
    private $state;

    public function __construct(int $state)
    {
        $this->state = $state;
    }

    public function changeState (int $state) : void
    {
        $this->state = $state;
    }

    public function getState () : int
    {
        return $this->state;
    }
}