<?php

namespace App\Classes;

class Ant
{
    private $x;
    private $y;
    private $boundaries;
    private $direction = 0; // face north on default.
    private $moveable = true;
    private $steps = 0;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @return int
     */
    public function getStepCount () : int
    {
        return $this->steps;
    }

    public function increaseStepCount () : void
    {
        $this->steps++;
    }

    /**
     * @return bool
     */
    public function isStuck () : bool
    {
        return !$this->moveable;
    }

    /**
     * @return int
     */
    public function getDirection ()
    {
        return $this->direction;
    }

    /**
     * Retrieve the position the Ant is at.
     * @return array
     */
    public function getPosition () : array
    {
        return ['x' => $this->x, 'y' => $this->y];
    }

    /**
     * @param array $boundaries
     */
    public function setBoundaries(array $boundaries) : void
    {
        $this->boundaries = $boundaries;
    }

    /**
     * Turn the ant by + 90 degrees.
     * @param int $times
     */
    public function turnRight ($times = 1) : void
    {
        for ($i = 0; $i < $times; $i++) {
            $newValue = $this->direction + (90);

            if (360 < $newValue) {
                $newValue = $newValue-360;
            }

            $this->direction = $newValue;
        }
    }

    /**
     * Turn the ant by negative 90 degrees.
     * @param int $times
     */
    public function turnLeft ($times = 1) : void
    {
        for ($i = 0; $i < $times; $i++) {
            $newValue = $this->direction - (90);

            if (0 > $newValue) {
                $newValue = 360+$newValue;
            }

            $this->direction = $newValue;
        }
    }

    /**
     * @return bool
     */
    public function up () : bool
    {
        if (!isset($this->boundaries) || empty($this->boundaries)) {
            $this->y--;
            return true;
        }

        if ($this->y > $this->boundaries['y']['min']) {
            $this->y--;
            return true;
        }

        $this->moveable = false;
        return false;
    }

    /**
     * @return bool
     */
    public function down () : bool
    {
        if (!isset($this->boundaries) || empty($this->boundaries)) {
            $this->y++;
            return true;
        }

        if ($this->y < $this->boundaries['y']['max']) {
            $this->y++;
            return true;
        }

        $this->moveable = false;
        return false;
    }

    /**
     * @return bool
     */
    public function left () : bool
    {
        if (!isset($this->boundaries) || empty($this->boundaries)) {
            $this->x--;
            return true;
        }

        if ($this->x > $this->boundaries['x']['min']) {
            $this->x--;
            return true;
        }

        $this->moveable = false;
        return false;
    }

    /**
     * @return bool
     */
    public function right () : bool
    {
        if (!isset($this->boundaries) || empty($this->boundaries)) {
            $this->x++;
            return true;
        }

        if ($this->x < $this->boundaries['x']['max']) {
            $this->x++;
            return true;
        }

        $this->moveable = false;
        return false;
    }
}